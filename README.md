
## Mailpoet Email Editor Demo

This plugin shows a working demo of the MailPoet Email Editor

The main editor package library is split into two packages
* `JS` -> [/packages/js/email-editor](/packages/js/email-editor)
* `PHP` -> [/packages/php/email-editor](/packages/php/email-editor)


Try it out at: [WordPress Playground](https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/triple0t/email-editor-demo/refs/heads/main/blueprint.json)

The Integration files are located at [/core](/core)

### How to use

* Download this Repo as a zip
* Upload to the WordPress site
* Activate the plugin
* Visit `wp-admin/edit.php?post_type=a8c_mail_post`, add/edit templates.


### Development

#### Plugin

You can use a local WordPress installation, the instructions here will use and assume you have [wp-env](https://developer.wordpress.org/block-editor/getting-started/devenv/get-started-with-wp-env/)
installed:

1. Clone this repository
2. Run `wp-env start --xdebug` (flag is optional)
3. Output will print your environment details

If you add PHP files, you must add them to the composer autoloader:

1. Run `wp-env run wordpress bash` to connect to your docker container
2. Navigate to `cd wp-content/plugins/a8cmail-editor/packages/php/email-editor/`
3. Run `composer dump-autoload`

#### Custom Blocks
Custom blocks rely on `abstract-block.php` for bootstrapping. They currently only use production assets. There is currently one block registered:

_The block in this example was originally created using `npx @wordpress/create-block@latest --source-path=. php-block`([documentation](https://developer.wordpress.org/block-editor/getting-started/devenv/get-started-with-create-block/))._

1. From repository root: `cd core/blocks/php-block`
2. Run `npm run build`
3. Expect the `build` folder in the directory to be refreshed(it contains the production minified files used by `abstract-block.php`)

#### Core Editor
**Note**: Ensure you have `npm` and `composer` in your system path

* Run npm install: -> `npm install`
* To run the watch server: -> `npm run dev`. Note: Please update `EMAIL_EDITOR_DEMO_USE_DEV_BUILD` to `true` to enusure the editor uses the development files.
* If you update the php files, and need to update the autoloader -> `npm run dev:dump-autoload`

#### Latest Versions
This repository is based off of active development of the editor that is incubated within MailPoet.
The latest editor package can be retrieved there: `https://github.com/mailpoet/mailpoet/`


