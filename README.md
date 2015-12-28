Email Marketing
==============

PHP/MySQL app for email marketing.

Server Requirements

PHP version 4.0+

Installation

1. admin/admin/config.php must be updated
2. app/assets/ck-editor/plugins/imgupload.php must be updated with correct upload dir for template editor
images
3. templates need to be added in templates table. Late it will also need to be added at the begining 
when user signs up for account in initial account setup (inserted into templates table).
4. save-lists.php redirect_uri needs to be updated.
5. app/emails.php and app/lists.php needs to have redirect_uri updated
6. app/bounce.php needs to be updated with correct incoming mail server info (all campaigns with the same
email are market as bounced if email bounces)
7. Links in app/templates/registration.html are hardcoded
8. All links in templates table need to be hardcoded to appear in IE