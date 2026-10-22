# Changelog: Product Page PDF for Magento 2

All releases of this extension, newest first. The released versions are commits on `main`, each tagged with its version number (e.g. [`100.12.3`](https://github.com/PluginCompany/magento2-product-page-pdf/releases/tag/100.12.3)); Composer installs these tags.

Tag `100.4.1` has no entry in the published changelog.

## 100.12.3 — 2022-07-24

- Fixed PHP 8.1 and Magento 2.4.4 code compatibility issues. Updated composer.json requirements for PHP 8.x.

## 100.12.2 — 2022-03-01

- Fix for composer dependency issue related to paragonie/random_compat version constraint in mpdf/qrcode package

## 100.12.1 — 2021-12-16

- Bugfix for issue which occurred when "Show Configurable Parent Images" is enabled in config. Related error messages: "An error has happened during application run." and "Error: Call to a member function getFile() on bool ".

## 100.12.0 — 2021-09-19

- Added option to include configurable parent product's images in configurable child product PDF
- Fix for images not showing when incorrect image base path is set in Magento. (Not really a bug)

## 100.11.8 — 2020-12-08

- Fixed "Use selected child product for PDF" not working on Magento 2.4.x
- Fixed "Use selected child product for PDF" issue when regular select attributes are used instead of the swatch system

## 100.11.7 — 2020-08-11

- Added mPDF QR Code library to composer requirements

## 100.11.6 — 2020-08-11

- Added additional constraint to mPDF version requirement

## 100.11.5 — 2020-08-11

- mPDF library version requirement update to v8.0 for PHP 7.4 / Magento 2.4.0 compatibility

## 100.11.4 — 2020-02-14

- Fixed issue causing "Load assets directly" option to not work properly when Magento unsecure and secure base URL differ

## 100.11.3 — 2019-10-23

- Fixed issue where configurable Product PDF would break when child product images are deleted from the server

## 100.11.2 — 2019-10-11

- Fixed bug which occurred when product contains textfield custom option

## 100.11.1 — 2019-09-16

- Product price in PDF now uses incl / excl Tax display settings for product view page

## 100.11.0 — 2019-09-06

- New feature which allows you to add a QR Code containing the product URL in the PDF header and PDF content area

## 100.10.1 — 2019-09-06

- Fixed conflict with Magento 2.3.x PageBuilder extension icons CSS

## 100.10.0 — 2019-08-30

- New feature which allows using the selected configurable child product for the PDF print-out instead of the parent product. When no options are selected, the parent product will be used.

## 100.9.0 — 2019-08-30

- New option to hide Yes/No attributes with "No" as value
- Fixed issue regarding Yes/No attributes not displaying in PDF

## 100.8.2 — 2019-08-11

- Fixed issue where bundle product PDF wouldn't load if the all products in a specific option group are deleted (Magento 2.x core bug workaround)

## 100.8.1 — 2019-08-08

- Improved error reporting on front-end
- Improved error logging functionality
- Fixed issue causing mPDF temp dir error in some cases

## 100.8.0 — 2019-08-01

- New option to directly show a print window in the browser when a PDF is opened
- Fixed issue causing CSS files and default store logo not being loaded correctly when both "Load Assets Directly" and developer mode are enabled

## 100.7.2 — 2019-07-24

- Code workaround due to bug in Magento Marketplace EQP validation system

## 100.7.1 — 2019-07-23

- Removed exec calls from Google Fonts installer and automatic mPDF library installer
- Improved automatic mPDF library installer functionality

## 100.7.0 — 2019-07-16

- Added custom CSS field in system configuration section, which allows to customize the PDF file CSS straight from the Magento 2 admin area
- Added css field code highlighting in system config

## 100.6.2 — 2019-04-16

- Updated license manager dependency in composer.json

## 100.6.1 — 2019-03-15

- Moved mPDF temp dir to var/tmp/mpdf for Magento Cloud compatibility. Thanks Eugene Shramko for proposed fix.

## 100.6.0 — 2019-03-14

- Added option to load assets directly using the filesystem instead of HTTP requests. This can solve image loading issues when running Magento in a docker container or behind a reverse proxy.
- Improved sensitivity of duplicate product image filtering functionality
- Moved Google Fonts installation to media directory for Magento Commerce Cloud compatibility
- Disabled caching for PDF response which solves some FPC related issues
- Fix for OSX / IOS PDF rendering error

## 100.5.4 — 2018-12-17

- Tested Magento 2.3.0 compatibility
- Fixed automatic mPDF library installer issues

## 100.5.3 — 2018-12-16

- Fixed issue where PDF style wouldn't render correctly when CSS minification is enabled
- Bugfix PDF files for product names with special characters

## 100.5.1 — 2018-10-26

- Updated i18n translation .csv file

## 100.5.0 — 2018-09-26

- Added option to set the amount of images to show in the media gallery section
- Improved duplicate image filter accuracy for similar images with different color

## 100.4.2 — 2018-07-22

- Small compatibility fix for Magento 2.2.4 and Magento 2.2.5
- Fix for admin PDF download button not working in some cases
- License manager module update

## 100.4.0 — 2018-05-19

- New feature allowing PDF printing on admin panel product page

## 100.3.1 — 2018-05-15

- Fix for price type attribute issue in product attributes table

## 100.3.0 — 2018-05-05

- New option to show / hide prices per PDF content section
- Fixed potential issue regarding empty select / multiselect attributes still showing when 'Hide empty attributes' is enabled
- Other code refactoring / improvements

## 100.2.2 — 2018-04-09

- Fixed custom options price issue

## 100.2.1 — 2018-03-16

- Added fallback method for installing Google Fonts
- Better error reporting
- New option to hide empty attributes from additional information section

## 100.1.8 — 2018-02-22

- Image gallery now falls back to single large image if no additional images are available

## 100.1.7 — 2018-02-22

- Fixed dependency injection issue caused by namespace mismatch after compiling

## 100.1.6 — 2018-02-20

- Added instructions to update permissions of mPDF tmp directory in case of write error

## 100.1.5 — 2018-02-16

- Folder permissions fix for mPDF library on PHP 5.6
- Updated installation manual regarding directory permissions

## 100.1.4 — 2018-02-03

- Improved default system config settings
- Fix for PDF link placement selector issue
- Fix for error logging during PDF generation

## 100.1.3 — 2018-01-31

- Added custom CSS selector field in admin store config section

## 100.1.2 — 2018-01-29

- Added fallback placeholder method for main image in media templates

## 100.1.1 — 2018-01-29

- Fix for Google Fonts directory retrieval issue
- Marketplace code workaround for exit call

## 100.1.0 — 2018-01-12

- Added automatic mPDF library installer in admin panel
- Fixed coding standard issues for Magento Marketplace
- Added automatic font downloader to reduce package size

## 100.0.0 — 2017-11-26

- First release of Magento 2 Product Page PDF extension by Plugin Company.
