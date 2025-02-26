<?php

namespace EmailEditorDemo;

use EmailEditorDemo\Blocks\Block_Types_Controller;
use MailPoet\EmailEditor\Engine\PersonalizationTags\Personalization_Tag;
use MailPoet\EmailEditor\Engine\PersonalizationTags\Personalization_Tags_Registry;
use EmailEditorDemo\Patterns\PatternsController;
use EmailEditorDemo\Templates\TemplatesController;

class EmailEditorDemoIntegration
{

  const A8C_MAIL_POST_TYPE = 'a8c_mail_post';

  private EmailEditorPageRenderer $editorPageRenderer;

  private EmailEditorDemoApiController $emailApiController;

	private PatternsController $patternsController;

	private TemplatesController $templatesController;

	private Block_Types_Controller $block_types_controller;

  public function __construct(
    EmailEditorPageRenderer $editorPageRenderer,
    EmailEditorDemoApiController $emailApiController,
		PatternsController $patternsController,
    TemplatesController $templatesController,
	  Block_Types_Controller $block_types_controller
  ) {
    $this->editorPageRenderer = $editorPageRenderer;
    $this->emailApiController = $emailApiController;
		$this->patternsController = $patternsController;
    $this->templatesController = $templatesController;
	  $this->block_types_controller = $block_types_controller;
  }

  public function initialize(): void
  {
    add_filter('mailpoet_email_editor_post_types', [$this, 'addEmailPostType']);
    add_filter('mailpoet_is_email_editor_page', [$this, 'isEditorPage'], 10, 1);
    add_filter('replace_editor', [$this, 'replaceEditor'], 10, 2);
		// register patterns
		$this->patternsController->registerPatterns();
		// register templates
    $this->templatesController->initialize();
	$this->block_types_controller->initialize();
    $this->extendEmailPostApi();
		$this->registerPersonalizationTags();

	// Add the duplicate link to action list for post_row_actions
	// for "post" and custom post types
	add_filter( 'post_row_actions', [$this, 'duplicate_post_link'], 25, 2 );
	// for "page" post type
	add_filter( 'page_row_actions', [$this, 'duplicate_post_link'], 25, 2 );

	add_action( 'admin_action_duplicate_post_as_draft', [$this, 'duplicate_post_as_draft'] );
	add_action( 'admin_notices', [$this, 'duplication_admin_notice'] );
  }

	function duplication_admin_notice() {

		// Get the current screen
		$screen = get_current_screen();
		if( 'edit' !== $screen->base ) {
			return;
		}

		if( isset( $_GET[ 'saved' ] ) && 'post_duplicate_created' === $_GET[ 'saved' ] ) {

			echo '<div class="notice notice-success is-dismissible"><p>Post copy created.</p></div>';

		}
	}

	function duplicate_post_as_draft(){

		if ( empty( $_GET[ 'post' ] ) ) {
			wp_die( 'No post to duplicate has been provided!' );
		}

		check_admin_referer( basename( __FILE__ ) );

		$post_id = absint( $_GET[ 'post' ] );

		$post = get_post( $post_id );

		$current_user = wp_get_current_user();
		$new_post_author = $current_user->ID;

		if( $post ) {

			// new post data array
			$args = array(
				'comment_status' => $post->comment_status,
				'ping_status'    => $post->ping_status,
				'post_author'    => $new_post_author,
				'post_content'   => $post->post_content,
				'post_excerpt'   => $post->post_excerpt,
				'post_name'      => $post->post_name,
				'post_parent'    => $post->post_parent,
				'post_password'  => $post->post_password,
				'post_status'    => 'draft', // $post->post_status,
				'post_title'     => $post->post_title . '(Duplicated)',
				'post_type'      => $post->post_type,
				'to_ping'        => $post->to_ping,
				'menu_order'     => $post->menu_order
			);
			$new_post_id = wp_insert_post( $args );

			/*
	 * get all current post terms ad set them to the new post draft
	 */
			$taxonomies = get_object_taxonomies( $post->post_type );
			if( $taxonomies ) {
				foreach( $taxonomies as $taxonomy ) {
					$post_terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'slugs' ) );
					wp_set_object_terms( $new_post_id, $post_terms, $taxonomy, false );
				}
			}

			// duplicate all post meta
			$post_meta = get_post_meta( $post_id );
			if( $post_meta ) {

				foreach ( $post_meta as $meta_key => $meta_values ) {
					// we need to exclude some system meta keys
					if( in_array( $meta_key, array( '_edit_lock', '_wp_old_slug' ) ) ) {
						continue;
					}
					// do not forget that each meta key can have multiple values
					foreach ( $meta_values as $meta_value ) {
						add_post_meta( $new_post_id, $meta_key, $meta_value );
					}
				}
			}

			wp_safe_redirect(
				add_query_arg(
					array(
						'post_type' => ( 'post' !== $post->post_type ? $post->post_type : false ),
						'saved' => 'post_duplicate_created' // just a custom slug here
					),
					admin_url( 'edit.php' )
				)
			);
			exit;

		} else {
			wp_die( 'Cannot duplicate the post because it could not be found.' );
		}

	}

	function duplicate_post_link( $actions, $post ) {

		if( ! current_user_can( 'edit_posts' ) ) {
			return $actions;
		}

		$url = wp_nonce_url(                       add_query_arg(
			array(
				'action' => 'duplicate_post_as_draft',
				'post' => $post->ID,
			),
			'admin.php'
		),
			basename(__FILE__),
		);

		$actions[ 'duplicate' ] = '<a href="' . esc_url( $url ) . '" title="Duplicate this item">Duplicate</a>';

		return $actions;
	}

  public function addEmailPostType(array $postTypes): array
  {
	  $postTypes[] = [
		  'name' => self::A8C_MAIL_POST_TYPE,
		  'args' => [
			  'labels' => [
				  'name' => __('A8CMail Editor', 'a8cmail-template-editor'),
				  'singular_name' => __('Template', 'a8cmail-template-editor'),
				  'add_new_item' => __('Add New Template', 'a8cmail-template-editor'),
				  'all_items' => __('Templates', 'a8cmail-template-editor'),
				  'edit_item' => __('Edit Template', 'a8cmail-template-editor'),
				  'view_item' => __('View Template', 'a8cmail-template-editor'),
				  'search_items' => __('Search Templates', 'a8cmail-template-editor')
			  ],
			  'rewrite' => ['slug' => self::A8C_MAIL_POST_TYPE],
			  'supports' => ['title', 'editor'],
			  'public' => true,
			  'show_ui' => true,
			  'show_in_menu' => true,
			  'show_in_rest' => true
		  ],
	  ];
	  return $postTypes;
  }

  public function isEditorPage(bool $isEditorPage): bool
  {
    if ($isEditorPage) {
      return $isEditorPage;
    }

    // We need to check early if we are on the email editor page. The check runs early so we can't use current_screen() here.
    if (is_admin() && isset($_GET['post']) && isset($_GET['action']) && $_GET['action'] === 'edit') {
      $post = get_post((int)$_GET['post']);
      return $post && $post->post_type === self::A8C_MAIL_POST_TYPE; // phpcs:ignore Squiz.NamingConventions.ValidVariableName.MemberNotCamelCaps
    }

    return false;
  }

  public function replaceEditor($replace, $post)
  {
    $currentScreen = get_current_screen();
    if ($post->post_type === self::A8C_MAIL_POST_TYPE && $currentScreen) { // phpcs:ignore Squiz.NamingConventions.ValidVariableName.MemberNotCamelCaps
      $this->editorPageRenderer->render();
      return true;
    }
    return $replace;
  }

  public function extendEmailPostApi() {
    register_rest_field(self::A8C_MAIL_POST_TYPE, 'mailpoet_data', [
      'get_callback' => [$this->emailApiController, 'getEmailData'],
      'update_callback' => [$this->emailApiController, 'saveEmailData'],
      'schema' => $this->emailApiController->getEmailDataSchema(),
    ]);
  }

	public function registerPersonalizationTags() {
		add_filter('mailpoet_email_editor_register_personalization_tags', function( Personalization_Tags_Registry $registry ): Personalization_Tags_Registry {
			$registry->register(new Personalization_Tag(
				__('User first name', 'email-editor-demo'),
				'guides/user-first-name',
				__('Subscriber', 'email-editor-demo'),
				function (array $context, array $args = []): string {
					if ( isset($context['is_user_preview'] ) && $context['is_user_preview'] ) {
						return 'John';
					}
					return '<?php echo "$user_first_name"; ?>';
				},
			));
			$registry->register(new Personalization_Tag(
				__('User Domain URL', 'email-editor-demo'),
				'guides/user-domain',
				__('Link', 'email-editor-demo'),
				function (array $context, array $args = []): string {
					$base_url = '';
					if ( isset( $args['base_url'] ) ) {
						$base_url = $args['base_url'];
					}

					if ( isset($context['is_user_preview'] ) && $context['is_user_preview'] ) {
						return $base_url . 'testa8c.wordpress.com';
					}
					return $base_url . '$domain';
				},
			));
			return $registry;
		});
	}
}
