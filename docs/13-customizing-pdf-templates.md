# Customizing PDF Templates

If you're looking to customize the Product PDF even more, it's quite straightforward to edit the included .phtml templates by following the steps below.

## Default template locations

You can find the original PDF .phtml templates in one of the following directories:

### Composer-based installations

```
vendor/plugincompany/productpdf/view/frontend/templates/pdf/
```

### Manual installations

```
app/code/PluginCompany/ProductPdf/view/frontend/templates/pdf/
```

## Copy template to your theme directory

To modify a template, it's recommended to copy it to your custom theme directory. That way it won't be overwritten when you update our extension.

If you'd for example like to modify the attributes table (additional information section), you can copy the following file:

```
app/code/PluginCompany/ProductPdf/view/frontend/templates/pdf/content/attributes.phtml
```

To the following directory:

```html
<your_theme_directory>/PluginCompany_ProductPdf/templates/pdf/content/attributes.phtml
```

Or if you'd for example like to modify the footer, you can copy the following file:

```
app/code/PluginCompany/ProductPdf/view/frontend/templates/pdf/footer.phtml
```

To the following directory:

```html
<your_theme_directory>/PluginCompany_ProductPdf/templates/pdf/footer.phtml
```

## Edit the template

Now you can edit the template and for example add the product SKU in this section with the following code snippet:

```php
<?php echo $this->getProduct()->getSku(); ?>
```

Or you could add an image using the following HTML code:

```html
<img src="https://yourdomain.com/media/image.png">
```

---

[Documentation index](./README.md) · [README](../README.md) · [Online version](https://plugin.company/knowledge-base/docs/magento2-product-page-pdf/user-manual/customizing-pdf-templates/)
