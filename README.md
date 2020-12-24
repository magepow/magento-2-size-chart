# Magento 2 Sizechart

Magento 2 Sizechart is a module allows admin to show their size chart diagram below product images on product page which helps customers choose the most suitable size for them.


Before you continue, ensure you meet the following requirements:

  * You have installed Magento2
  * You should use a Linux or Mac OS machine. Windows is not currently supported.
  Install magento2-instagram extension

## Step 1 : Download Magento 2 Sizechart Extension
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
   Choose `Catalog->Product->Edit->Size Chart` on product you want to add rule
    ![Image of magento backend](https://github.com/magepow/magento2-sizechart/blob/master/media/rule_product.png)
    
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

      
**Free Extensions List**

* [Magento 2 Categories Extension](https://alothemes.com/magento-categories-extension.html)

* [Magento 2 Sticky Cart](https://alothemes.com/magento-sticky-cart.html)

**Premium Extensions List**

* [Magento 2 Pages Speed Optimizer](https://alothemes.com/magento2-speed-optimizer.html)

* [Magento 2 Mutil Translate](https://alothemes.com/magento-multi-translate.html)

* [Magento 2 Instagram Integration](https://alothemes.com/magento-2-instagram.html)

* [Magento 2 Lookbook Pin Products](https://alothemes.com/lookbook-pin-products.html)

**Featured Magento Themes**

* [Expert Multipurpose responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/expert-premium-responsive-magento-2-and-1-support-rtl-magento-2-/21667789)

* [Gecko Premium responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/gecko-responsive-magento-2-theme-rtl-supported/24677410)

* [Milano Fashion responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/milano-fashion-responsive-magento-1-2-theme/12141971)

* [Electro responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/electro-responsive-magento-1-2-theme/17042067)

* [Pizzaro Food responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/pizzaro-food-responsive-magento-1-2-theme/19438157)

* [Biolife Organic responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/biolife-organic-food-magento-2-theme-rtl-supported/25712510)

* [Market responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/market-responsive-magento-2-theme/22997928)

* [Kuteshop responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/kuteshop-multipurpose-responsive-magento-1-2-theme/12985435)

**Featured Magento Services**

* [PSD to Magento 2 Theme Conversion](https://alothemes.com/psd-to-magento-theme-conversion.html)

* [Magento Speed Optimization Service](https://alothemes.com/magento-speed-optimization-service.html)

* [Magento Security Patch Installation](https://alothemes.com/magento-security-patch-installation.html)

* [Magento Website Maintenance Service](https://alothemes.com/website-maintenance-service.html)

* [Magento Professional Installation Service](https://alothemes.com/professional-installation-service.html)

* [Magento Upgrade Service](https://alothemes.com/magento-upgrade-service.html)

* [Customization Service](https://alothemes.com/customization-service.html)

* [Hire Magento Developer](https://alothemes.com/hire-magento-developer.html)

[![Latest Stable Version](https://poser.pugx.org/magepow/sizechart/v/stable)](https://packagist.org/packages/magepow/sizechart)
[![Total Downloads](https://poser.pugx.org/magepow/sizechart/downloads)](https://packagist.org/packages/magepow/sizechart)
