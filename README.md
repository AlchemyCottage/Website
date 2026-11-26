# Local WordPress Setup

These instructions set up the ***[Alchemy Cottage](https://github.com/AlchemyCottage/Website/releases/tag/v1.1)*** theme on a fresh local *WordPress* site using *[Local](https://localwp.com/)*.

## Prerequisites

- A working *Local WordPress* site
- The ***Alchemy Cottage*** theme files
- The content exports in the `exports/` directory

## 1. Install and activate the theme

1. Copy the `alchemycottage` theme folder into your *WordPress* installation’s `wp-content/themes/` directory.
2. In the *WordPress* dashboard, go to **Appearance → Themes**.
3. Activate ***<ins>Alchemy Cottage</ins>***.

Keep the theme active before importing recipes so *WordPress* has registered the `recipe` content type.

## 2. Install the required plugins

1. Go to **Plugins → Add New Plugin**.
2. Search for **[WooCommerce](https://github.com/woocommerce/woocommerce/releases/tag/11.3.1)** by *Automattic*, select **Install Now**, and then select **Activate**.
3. Complete the setup wizard or skip optional setup steps for local testing.

Install any additional plugins required by your own setup. Plugin versions may change; use the *WordPress* plugin directory unless a specific version is required for compatibility.

## 3. Import pages

1. In the dashboard, go to **Tools → Import**.
2. Under ***WordPress***, select **Install Now** if prompted, then select **Run Importer**.
3. Choose the *<ins>pages</ins>* export XML file from `exports/` and select **Upload file and import**.
4. Assign the imported content to an existing local user, or create a user if appropriate.
5. Select **Download and import file attachments** if you want *WordPress* to try to download the associated media.
6. Submit the import.

If some media fails to import, check that the original media URLs are reachable. You can also add the image files to the *Local* site’s Media Library manually.

## 4. Import recipes

This step is optional if you prefer to create recipes manually.

1. Repeat the *WordPress* importer steps using the *<ins>recipe</ins>* export XML file from `exports/`.
2. Assign the imported content to a local user.
3. Select **Download and import file attachments** if you want the importer to fetch recipe image.
4. Submit the import.

Afterward, check **Recipes** in the dashboard to confirm the recipes were imported.

## 5. Create the header menu

1. Go to **Appearance → Menus** and create a menu for the header.
2. Assign it to the **Header Menu Items** theme location.
3. If the **Recipes** panel is not visible, open **Screen Options** at the top of the page and enable **Recipes**.
4. Add these items in this order:
   1. Home
   2. Recipes
   3. Shop
   4. Cart
5. Select **Save Menu**.

## 6. Create the footer menu

1. Create another menu and assign it to the footer menu location.
2. Add these pages in this order:
   1. Contact
   2. Order Tracking
   3. Terms of Service
   4. Privacy Policy
3. Change the **Order Tracking** navigation label to **Track Order**.
4. Select **Save Menu**.

If a page is not available in the menu editor, confirm that it was imported or create it first.

## 7. Add a product
This step is optional if you prefer to create products manually.\
You can create a product manually or import a sample product export.

1. Repeat the *WordPress* importer steps using the *<ins>product</ins>* export XML file from `exports/`.
2. Assign the imported content to a local user.
3. Select **Download and import file attachments** if you want the importer to fetch the product image.
4. Submit the import.

For the sample product, open **Products**, select **Sugar Daddy Cookies**, and set its Recipe page using the recipe field provided by the theme. Save or update the product.

## 8. Test checkout locally

For local testing, use an offline payment method such as **Cash on delivery** or **Check payments**, if available in your *WooCommerce* setup. Do not enter live payment credentials or process real payments from a local development site.

## Optional: email testing

Install **[WP Mail SMTP](https://github.com/awesomemotive/WP-Mail-SMTP/releases/tag/4.10.5)** from **Plugins → Add New Plugin** only if your local testing requires it. Configure a suitable test mail service.

## Before launching a live store

Local setup is for development and testing. Before accepting real orders, configure the production site, HTTPS, shipping, taxes, privacy policy information, terms of service page, email delivery, and a payment provider supported for the business’ location. Follow the provider’s current on-boarding instructions. *[WooPayments](https://woocommerce.com/document/woopayments/account-management/partnership-with-stripe/)*, specifically, requires connecting a *[WordPress.com](https://wordpress.com/home)* account; other providers may have different requirements.

## Branding and Attribution

The code in this repository is licensed under the **GPL**, which lets you use, modify, and redistribute it. That license does not grant rights to the ***Alchemy Cottage*** name, logo, trademarks, or brand identity.

The sample content exports in this repository, including `product.xml` and `recipe.xml`, may be used in your own deployment, provided that you credit them as coming from ***Alchemy Cottage***. Other site content, such as photos, text, and legal pages, is not covered by this permission unless stated otherwise.

If you launch a site based on this code, you must also:

- Replace the ***Alchemy Cottage*** site name, logo, and other branding with your own.
- Avoid presenting your site as ***Alchemy Cottage***, or as affiliated with, endorsed by, or connected to ***Alchemy Cottage***, unless you have *written permission* from the owner.

Written consent is required for any use of the ***Alchemy Cottage*** name or branding beyond what the **GPL** permits.

