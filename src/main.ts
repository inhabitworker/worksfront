import './style/header.css'
import './style/post.css'
import './style/posts.css'
import './style/layout.css'
import './style/menu.css'
import './style/terms.css'
import './style/frontpage.css'

import './style/woocommerce/account.css'
import './style/woocommerce/cart.css'
import './style/woocommerce/product.css'
import './style/woocommerce/loop.css'

import windowFunctions from './scripts/window'
import { frontpage } from './scripts/landing' 

Object.assign(window, windowFunctions);

export const help = "me";
console.log("what;s up im main.");

frontpage();