[<img src="https://github.com/magepow/themeforest/blob/master/shopify/shopify_affiliate.jpg" >](https://shopify.pxf.io/VyL446)

## Magento 2 Size Chart

Magento 2 Sizechart is a module allows admin to show their size chart diagram below product images on product page which helps customers choose the most suitable size for them.

Displaying exact product sizes on the website makes it easy for customers to choose the right product for their needs.

Product size will vary depending on the brand, each country. Therefore, adding a product-specific size chart on your e-commerce website is essential.

### Benefits

- Create size chart according to product characteristics: clothes, shoes, electronic devices, furniture, accessories...

- Show size chart inline, custom tab, popup.

- Add linked text, images or labels.

- Save time for the project

- Apply precedence rule to size chart

- Manage size rules in the backend

- Avoid customers returning products due to size problems

- Works well on mobile devices

## How does Site Chart work for Magento

- Detail Description: [Magento 2 Size Chart](https://magepow.net/magento-2-size-chart.html)

- [DOCUMENTATION](https://magepow.net/blog/2024/11/16/magento-2-size-chart/)

[![Latest Stable Version](https://poser.pugx.org/magepow/sizechart/v/stable)](https://packagist.org/packages/magepow/sizechart)
[![Total Downloads](https://poser.pugx.org/magepow/sizechart/downloads)](https://packagist.org/packages/magepow/sizechart)
[![Daily Downloads](https://poser.pugx.org/magepow/sizechart/d/daily)](https://packagist.org/packages/magepow/sizechart)

## Download Magento 2 Sizechart Extension
### Install via composer (recommend)
Run the following commands in Magento 2 root folder:
```
composer require magepow/sizechart
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f

```

## Step 2: How to use Magento 2 Sizechart?

  ### 1. General configuration

  Login to magento admin, choose `stores->configuration->magepow->Sizechart`
  
  ![Image of magento admin config](https://github.com/magepow/magento2-sizechart/blob/master/media/config.png)

  Select `yes` to enable the module
  
  ### 2. Details Configuration
  
   In `stores->configuration->magepow->sizechart` we set: 
   * Display text link : Show text link if user sets popup for displaying size chart.
   * Image icon : Select image icon (only using when user sets popup for displaying size chart)
    ![Image of magento backend](https://github.com/magepow/magento2-sizechart/blob/master/media/config-popup.png)
   ### 3. Add Sizechart
   Choose `Magepow->Size chart Management->Add New Size Chart Rule`.
   ![Image of magento backend](https://github.com/magepow/magento2-sizechart/blob/master/media/add-content1.png)
   ![Image of magento backend](https://github.com/magepow/magento2-sizechart/blob/master/media/add-content2.png)
   ![Image of magento backend](https://github.com/magepow/magento2-sizechart/blob/master/media/add-content3.png)
   
   * Name: Name of your size chart management rule
   * Store View : Define which store view you wish to show
   * Description : Introduce about your size chart
   * Size chart Information : Details about your size chart : you can write your diagram, image as you want
   * Sort order : This part is used for the priority. If there is any rule have the same information. then the one which lower number will have the higher priority.
   * Type Display : You can choose 3 types of displaying included: Inline, Custom Tab, Popup.
   * Status: Select Enable/Disable for turning on/off the size chart rule.
   
   ### 4. Edit Sizechart
   ![Image of magento backend](https://github.com/magepow/magento2-sizechart/blob/master/media/edit.png)
   ### 5. Delete Sizechart
   ![Image of magento backend](https://github.com/magepow/magento2-sizechart/blob/master/media/delete.png)
   ### 6. Product Rule
   Choose `Magepow->Size chart Management->Add New Size Chart Rule` and set number for sort order
    
   This part is used for the priority of size chart. The rule on this part will be prioritized to show. This is for prevent the conflict when multiple rule are applied on one product or rally of products.
    
   Run the following command:
   
   ```
   php bin/magento cache:clean
   ```
   
  ### 3. Result
   
   ![Image of magento store front](https://github.com/magepow/magento2-sizechart/blob/master/media/result.png)
   
 ## Donation

If this project help you reduce time to develop, you can give me a cup of coffee :) 

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/paypalme/alopay)

      
**[Our Website](https://magepow.net)**

**[Our Magento 2 Extensions](https://magepow.net/extensions.html)**

* [Magento 2 Recent Order Notification](https://magepow.net/magento-2-recent-order-notification.html)

* [Magento 2 Categories Extension](https://magepow.net/magento-2-categories-extension.html)

* [Magento 2 Sticky Cart](https://magepow.net/magento-sticky-add-to-cart.html)

* [Magento 2 Lazy Load](https://magepow.net/magento-2-lazy-load-extension.html)

* [Magento 2 Lookbook Pin Products](https://magepow.net/lookbook-pin-products.html)

* [Magento 2 Ajax add to cart](https://magepow.net/magento-2-ajax-add-to-cart.html)

* [Magento 2 Speed Optimizer](https://magepow.net/magento2-speed-optimizer.html)

* [Magento 2 Quick Edit](https://magepow.net/magento-2-quick-edit.html)

* [Magento 2 Product Zoom](https://magepow.net/magento-2-product-zoom.html)

* [Magento 2 Layered Navigation Advanced](https://magepow.net/magento-2-layered-navigation-advanced.html)

* [Magento 2 Product Tags](https://magepow.net/magento-2-product-tags.html)

* [Special Promotion for Magento 2](https://magepow.net/magento-2-special-promotion-extension.html)

* [Magento 2 Size Chart](https://magepow.net/magento-2-size-chart.html)

* [Magento 2 Auto related products](https://magepow.net/magento-2-auto-related-products.html)

* [Magento 2 Sitemap Exclusion](https://magepow.net/magento-2-sitemap-exclusion.html)

* [Magento 2 Mega Menu](https://magepow.net/magento-2-mega-menu.html)

* [Magento 2 Sitemap](https://magepow.net/magento-2-sitemap.html)

* [Magento 2 Ajax Wishlist](https://magepow.net/magento-2-ajax-wishlist.html)

* [Magento 2 PDF Invoice Frontend](https://magepow.net/magento-2-pdf-invoice-frontend.html)

* [Magento 2 Bundle Pack](https://magepow.net/magento-2-bundle-product.html)

* [Magento 2 Product Zoom 360](https://magepow.net/magento-2-product-zoom-360.html)

**[Our Magento 2 services](https://magepow.com/magento-services.html)**

* [PSD to Magento 2 Theme Conversion](https://alothemes.com/psd-to-magento-theme-conversion.html)

* [Magento 2 Speed Optimization Service](https://magepow.com/magento-speed-optimization-service.html)

* [Magento 2 Security Patch Installation](https://magepow.com/magento-security-patch-installation.html)

* [Magento 2 Website Maintenance Service](https://magepow.com/website-maintenance-service.html)

* [Magento 2 Professional Installation Service](https://magepow.com/professional-installation-service.html)

* [Magento 2 Upgrade Service](https://magepow.com/magento-upgrade-service.html)

* [Magento 2 Customization Service](https://magepow.com/customization-service.html)

* [Hire Magento 2 Developer](https://magepow.com/hire-magento-developer.html)

**[Our Magento 2 Themes](https://alothemes.com/)**

* [Expert Multipurpose Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/expert-premium-responsive-magento-2-and-1-support-rtl-magento-2-/21667789)

* [Gecko Premium Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/gecko-responsive-magento-2-theme-rtl-supported/24677410)

* [Milano Fashion Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/milano-fashion-responsive-magento-1-2-theme/12141971)

* [Electro 2 Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/electro2-premium-responsive-magento-2-rtl-supported/26875864)

* [Electro Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/electro-responsive-magento-1-2-theme/17042067)

* [Pizzaro Food responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/pizzaro-food-responsive-magento-1-2-theme/19438157)

* [Biolife organic responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/biolife-organic-food-magento-2-theme-rtl-supported/25712510)

* [Market responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/market-responsive-magento-2-theme/22997928)

* [Kuteshop responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/kuteshop-multipurpose-responsive-magento-1-2-theme/12985435)

* [Bencher - Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/bencher-responsive-magento-1-2-theme/15787772)

* [Supermarket Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/supermarket-responsive-magento-1-2-theme/18447995)

**[Our Shopify Themes](https://themeforest.net/user/alotheme)**

* [Dukamarket - Multipurpose Shopify Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/dukamarket-multipurpose-shopify-theme/36158349)

* [Ohey - Multipurpose Shopify Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/ohey-multipurpose-shopify-theme/34624195)

* [Flexon - Multipurpose Shopify Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/flexon-multipurpose-shopify-theme/33461048)

**[Our Shopify App](https://apps.shopify.com/partners/maggicart)**

* [Magepow Infinite Scroll](https://apps.shopify.com/magepow-infinite-scroll)

* [Magepow Promotionbar](https://apps.shopify.com/magepow-promotionbar)

* [Magepow Size Chart](https://apps.shopify.com/magepow-size-chart)

**[Our WordPress Theme](https://themeforest.net/user/alotheme/portfolio)**

* [SadesMarket - Multipurpose WordPress Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/sadesmarket-multipurpose-wordpress-theme/35369933)
