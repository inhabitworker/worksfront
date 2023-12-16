# Info
This is a theme for my wordpress site, which uses wooCommerce to power the store, while still retaining and promoting typical blog-ability.

# To-Do
- 3D model products rendering previews and animations server-side, probably a separate plugin.
	- Likely best approach is to use threejs and off screen canvas, see [this](https://discourse.threejs.org/t/backend-rendering-of-a-preview-image/43112).
	- Would this extend product model in some way or work by separate table reference?
- Consider re-dynamicalizing the "nav menu" for menus.
	- Left static to use icons/have exact design.
- Posts index: tags/categories interactive overflow manage with js.
- Plugin to extend post_meta (tags, categories) with association to colours for styling.
- Social links widget w/ icons.
- Interactivity for cart/woocommerce header items.

# References
In order to learn and explore how WP works, and how we might use other tools and integrations, I enjoyed taking a look at the following projects.

## Themes
- [woocommerce - storefront](https://github.com/woocommerce/storefront): standard reference woocommerce theme.
- [DannyCooper - cashier](https://github.com/DannyCooper/cashier): simple woocommerce theme.
- [davidegreenwald - Bare Minimum](https://github.com/davidegreenwald/Bare-Minimum): skeletal wordpress theme.
- [benchmarkstudios - barebones](https://github.com/benchmarkstudios/barebones): simple wordpress theme, uses laravel-mix (webpack) for assets.

## Vite
- [andrefelipe - vite-php-setup](https://github.com/andrefelipe/vite-php-setup): barebones vite usage, no wordpress.
- [8bit-echo - sage-vite](https://github.com/8bit-echo/sage-vite/): integrating vite with a laravel directed theme.
- [kucrut - vite-for-wp](https://github.com/kucrut/vite-for-wp/): focus on parsing the vite manifest with additional package.

# Colour
- [Pixelgrade - Bucket](https://pixelgrade.com/docs/bucket/advanced-customizations/get-custom-colors-categories/): commercial theme with no source, but shows a prefereable implementation of this. 