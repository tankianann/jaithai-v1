# URL and Routing Inventory

**Last reviewed:** 2026-10-02

This document records the application-owned URLs discovered in the current CodeIgniter source. It covers dynamic application routes and legacy aliases, not individual files under `assets/`, framework files, or generated PDFs.

## How Routing Works

- Apache serves real files and directories directly.
- Every other request is internally rewritten by `src/.htaccess` to `/index.php`.
- `src/application/config/routes.php` defines only the home-page controller: `/` resolves to `jtpages/index`.
- All other native URLs use CodeIgniter's default `/controller/method/parameter` convention.
- The old `.php` mappings in `routes.php` are commented out. Active `.php` compatibility comes from Apache `Redirect 301` directives in `src/.htaccess`.
- Paths are documented in lower case because that is how the application links to them. Treat path casing as significant at the web-server boundary.

## Public Legacy Aliases and Native URLs

These are the active 301 mappings in `src/.htaccess`. Query strings are retained, so an order link such as `/acknowledgeorder.php?oh=...` reaches `/cart/acknowledgeorder?oh=...`.

### Restaurant and General Pages

| Legacy `.php` URL | Native URL | Notes |
| --- | --- | --- |
| `/restaurant-menu.php` | `/jtpages/restaurantmenu` | Restaurant-menu landing page |
| `/menu-family-set.php` | `/jtpages/menufamilyset` | Family set menu |
| `/menu-individual-set.php` | `/jtpages/menuindividualset` | Individual set menu |
| `/menu-jaithai.php` | `/jtpages/menujaithai` | Jai Thai restaurant menu |
| `/menu-vegetarian.php` | `/jtpages/menuvegetarian` | Vegetarian restaurant menu |
| `/catering-menu.php` | `/jtpages/cateringmenu` | Catering-menu landing page |
| `/about-achievements.php` | `/jtpages/aboutachievements` | Achievements page |
| `/about-employment.php` | `/` | Retired page; there is no current `aboutemployment` method |
| `/about-history.php` | `/jtpages/abouthistory` | History page |
| `/about-outlets.php` | `/jtpages/aboutoutlets` | Outlets page |

### Catering Menus

| Legacy `.php` URL | Native URL | Menu |
| --- | --- | --- |
| `/catering-menu-a.php` | `/jtmenu/cateringmenua` | Set Catering Menu A |
| `/catering-menu-b.php` | `/jtmenu/cateringmenub` | Set Catering Menu B |
| `/catering-menu-c.php` | `/jtmenu/cateringmenuc` | Set Catering Menu C |
| `/catering-menu-d.php` | `/jtmenu/cateringmenud` | Set Catering Menu D |
| `/catering-diy-a.php` | `/jtmenu/cateringdiya` | DIY Catering Menu A |
| `/catering-diy-b.php` | `/jtmenu/cateringdiyb` | DIY Catering Menu B |
| `/catering-diy-c.php` | `/jtmenu/cateringdiyc` | DIY Catering Menu C |
| `/catering-diy-d.php` | `/jtmenu/cateringdiyd` | DIY Catering Menu D |
| `/vegetarian-menu-a.php` | `/jtmenu/vegetarianmenua` | Vegan/vegetarian Catering Menu A |
| `/vegetarian-menu-b.php` | `/jtmenu/vegetarianmenub` | Vegan/vegetarian Catering Menu B |
| `/vegetarian-menu-c.php` | `/jtmenu/vegetarianmenuc` | Vegan/vegetarian Catering Menu C |
| None | `/jtmenu/vegetarianmenud` | Vegan Catering Menu D; native route only |
| `/mini-parties-package.php` | `/jtmenu/minipartyset` | Mini Party Set |
| `/mini-parties.php` | `/jtmenu/minipartyalacarte` | Mini Party DIY/a la carte |
| `/catering-bento-set.php` | `/jtmenu/bento` | Bento set |
| `/catering-sanook-set.php` | `/jtmenu/sanook` | Sanook set |

Vegan Catering Menu D uses only the native `/jtmenu/vegetarianmenud` route. No legacy `.php` alias is provided, at the user's direction.

### Cart and Customer Actions

| Legacy `.php` URL | Native URL | Notes |
| --- | --- | --- |
| `/cart.php` | `/cart` | View or submit the cart |
| `/orderplaced.php` | `/cart/orderplaced` | Uses order ID stored in session flash data |
| `/acknowledgeorder.php` | `/cart/acknowledgeorder` | Customer acknowledgement/payment entry point; requires `?oh={orderHash}` |
| `/leavefeedback.php` | `/cart/leavefeedback` | Feedback form and submission; requires `?oh={orderHash}` |

## Native Public URLs Without `.php` Aliases

### General Pages

| Native URL | Purpose |
| --- | --- |
| `/` | Home page; default route for `jtpages/index` |
| `/jtpages` or `/jtpages/index` | Explicit forms of the home route |
| `/jtpages/remembrance` | Remembrance page |
| `/jtpages/promo` | Promotion page |
| `/jtpages/terms` | Terms page |

### Current and Seasonal Menus

| Native URL | Purpose |
| --- | --- |
| `/jtmenu/chaiyo` | Chaiyo set |
| `/jtmenu/chaiyovegan` | Chaiyo vegan set |
| `/jtmenu/sawasdee` | Sawasdee set |
| `/jtmenu/sawasdeevegan` | Sawasdee vegan set |
| `/jtmenu/chokdee` | Chokdee set |
| `/jtmenu/chokdeevegan` | Chokdee vegan set |
| `/jtmenu/thaicelebration` | Thai Celebration set |
| `/cnymenu/cnyjoy` | CNY Joy menu |
| `/cnymenu/cnyfortune` | CNY Fortune menu |
| `/cnymenu/cnyprosperity` | CNY Prosperity menu |
| `/cnymenu/cnyfamilyset` | CNY family set |
| `/cnymenu/cnyaddons` | CNY add-ons menu |
| `/cnymenu/yusheng` | Yusheng menu |
| `/xmasmenu/xmasminiparty` | Christmas mini-party menu |
| `/xmasmenu/xmascatering` | Christmas catering menu |
| `/specialmenu/mothersday` | Mother's Day menu |

The controller index URLs `/jtmenu`, `/cnymenu`, `/xmasmenu`, `/specialmenu`, and `/upsells` are technically routable but their current `index()` methods render no content.

### Cart and Checkout Services

| URL | Inputs or behavior |
| --- | --- |
| `/cart/clear` | Clears the current session cart |
| `/cart/change/{cartItemKey}` | Removes an item and returns to its menu for reselection |
| `/cart/remove/{cartItemKey}` | Removes an item from the current session cart |
| `/cart/paypalipn` | PayPal server callback; expects POST data |
| `/cart/paypalcancel` | PayPal cancellation return URL |
| `/cart/paypalreturn` | PayPal success return URL |
| `/upsells/selfheatingsets` | Adds submitted self-heating sets to the cart |
| `/cnymenu/addupsells/{quantity}` | Adds the legacy CNY upsell quantity to the cart |
| `/ajax/checkpostalsurcharge/{postalCode}` | Returns `1` or `0` for the Sentosa surcharge check |
| `/ajax/getpostaladdress/{postalCode}` | Returns a OneMap address lookup as JSON |

`/ajax` and `/api` themselves are also routable but return empty responses.

## API URLs

| URL | Purpose |
| --- | --- |
| `/api/orders/add` | Accepts a JSON request body and creates an order |
| `/api/orders/get/{orderId}` | Returns an order as JSON |

These endpoints do not currently show an authentication or authorization check in their controller. Treat them as security-review targets, not as a supported public API contract.

## Administration URLs

The following routes are part of the web administration module. Most call `limitAccess()` in the controller; the exceptions called out below need separate review.

### Login and Screens

| URL | Purpose |
| --- | --- |
| `/jtadmin` | Redirects to login |
| `/jtadmin/login` | Login form and submission |
| `/jtadmin/logout` | Logout |
| `/jtadmin/logout/unauthorized` | Logout with an unauthorized message |
| `/jtadmin/dashboard` | Active orders dashboard |
| `/jtadmin/dashboardcredit` | Credit orders dashboard |
| `/jtadmin/dashboardarchived?year={year}&order={orderNumber}` | Archived orders dashboard and filters |
| `/jtadmin/report` | Reports |
| `/jtadmin/feedback` | Customer feedback |
| `/jtadmin/vouchers` | Vouchers |
| `/jtadmin/vieworder/{orderId}` | Order details |
| `/jtadmin/vieworderpdf/{orderId}` | Custom order-PDF form/action |
| `/jtadmin/getpdf/{type}/{orderId}` | Generate a PDF; type is `foodtag`, `timestamp`, `dishlabels`, or `invoice` |

### Single-Order Editing and State Changes

| URL pattern | Purpose |
| --- | --- |
| `/jtadmin/addorderitem/{orderId}` | Add an item |
| `/jtadmin/editorderdetails/{orderId}` | Edit customer/order details |
| `/jtadmin/editorderitemsetmenu/{orderId}/{cartItemKey}` | Edit a set-menu item |
| `/jtadmin/editorderitemalacarte/{orderId}/{cartItemKey}` | Edit an a-la-carte item |
| `/jtadmin/editordersurcharges/{orderId}` | Edit surcharges |
| `/jtadmin/editorderaddonfees/{orderId}` | Edit add-on fees |
| `/jtadmin/removeorderitem/{orderId}/{cartItemKey}` | Remove an item |
| `/jtadmin/assignoutlet/{orderId}/{branchCode}` | Assign an outlet |
| `/jtadmin/assigndriver/{orderId}` | Assign a driver; form submission |
| `/jtadmin/addtocalendar/{orderId}` | Mark calendar addition |
| `/jtadmin/confirmorder/{orderId}` | Confirm and notify |
| `/jtadmin/acknowledgeorder/{orderId}` | Record acknowledgement |
| `/jtadmin/payorder/{orderId}` | Mark paid without notification |
| `/jtadmin/payorder/{orderId}/notify` | Mark paid and notify |
| `/jtadmin/unpayorder/{orderId}` | Mark unpaid |
| `/jtadmin/payandarchiveorder/{orderId}` | Mark paid and archive |
| `/jtadmin/paythankarchiveorder/{orderId}` | Mark paid, thank with voucher, and archive |
| `/jtadmin/creditorder/{orderId}` | Mark as credit payment |
| `/jtadmin/uncreditorder/{orderId}` | Remove credit status |
| `/jtadmin/deliverorder/{orderId}` | Mark delivered |
| `/jtadmin/thankcustomer/{orderId}` | Send thanks with voucher |
| `/jtadmin/thankcustomernovoucher/{orderId}` | Send thanks without voucher |
| `/jtadmin/archiveorder/{orderId}` | Archive |
| `/jtadmin/cancelorder/{orderId}` | Cancel |
| `/jtadmin/cancelandarchiveorder/{orderId}` | Cancel and archive |
| `/jtadmin/uncancelorder/{orderId}` | Restore a cancelled order |
| `/jtadmin/unarchiveorder/{orderId}` | Restore an archived order |
| `/jtadmin/usevoucher/{voucherId}` | Mark a voucher as used |

### Bulk and AJAX Administration Actions

| URL | Purpose |
| --- | --- |
| `/jtadmin/archivemany` | Bulk archive; form submission |
| `/jtadmin/creditmany` | Bulk credit; form submission |
| `/jtadmin/paythankvoucherarchivemany` | Bulk pay, thank, voucher, and archive; form submission |
| `/jtadmin/ajax` | Loads an order-action fragment from POST fields |
| `/jtadmin/ajaxusevoucher` | Loads a voucher-action fragment from POST fields |
| `/jtadmin/ajaxorderremoveitem/{orderId}` | Loads the remove-item fragment from a POSTed cart key |
| `/jtadmin/sendordersms/{orderId}` | Sends an order SMS |

The four routes in the last four rows do not currently call `limitAccess()` themselves. They should be audited before assuming the whole `/jtadmin` namespace is protected.

## Operational and Developer URLs

These methods are reachable through normal CodeIgniter routing but are not customer pages.

| URL | Current behavior or risk |
| --- | --- |
| `/cron` | Redirects to the home page |
| `/cron/sms_orders_today` | Selects upcoming orders and can send customer SMS messages |
| `/kianann` | Empty response |
| `/kianann/go20260807` | Regenerates PDFs for hard-coded orders |
| `/kianann/generateorderpdf/{orderId}` | Generates an order food-tag PDF |
| `/kianann/quote?p={minimum}` | Displays order/customer data filtered by value |
| `/kianann/testbrevo` | Empty test method |
| `/kianann/testsms` | Sends a test SMS when outbound activity is enabled |
| `/kianann/do20190128` | Historical bulk-SMS utility |
| `/kianann/cny2026reminder` | Displays reminder content for selected orders |
| `/kianann/regenpdf/{orderId}` | Regenerates order PDFs |
| `/kianann/ordertohtml` | Writes HTML for a hard-coded order |
| `/kianann/htmltopdf` | Converts hard-coded order HTML to PDF |
| `/kianann/sms_orders_today` | Historical upcoming-order SMS utility |

No route-level protection is visible on the `cron`, `api`, or `kianann` controllers. Restrict or remove these routes before treating the route surface as hardened. Local outbound-service guards reduce accidental side effects but are not access control.

## Stale or Inactive URLs Found in Source

These names appear in links or commented historical routes but have no active controller method or redirect today:

| URL | Finding |
| --- | --- |
| `/cny-mini-party.php` | Still linked by promotion/home views; its old route is commented out |
| `/xmas-mini-party.php` | Still linked by the home view; its old route is commented out |
| `/xmas-set.php` | Historical commented route only |
| `/remembrance.php` | Historical commented route only; native `/jtpages/remembrance` exists |
| `/promo.php` | Historical commented route only; native `/jtpages/promo` exists |
| `/cnymenu/cnyhappiness` | Linked in the catering landing view but no controller method exists |
| `/cnymenu/cnydelight` | Linked in the catering landing view but no controller method exists |
| `/cnymenu/cnytreasure` | Linked in the catering landing view but no controller method exists |
| `/jtpages/aboutemployment` | Historical route target only; no controller method exists |

The large JaiSiam redirect block in `src/.htaccess` is entirely commented out and is not active routing.

## Host-Independent 301 Redirects

Yes. The legacy redirects can omit `https://www.jai-thai.com` and use an absolute path as the destination:

```apache
Redirect 301 /restaurant-menu.php /jtpages/restaurantmenu
Redirect 301 /catering-menu-c.php /jtmenu/cateringmenuc
Redirect 301 /cart.php /cart
```

Apache will construct the response URL from the current request's scheme and host. This keeps local requests on `localhost` and production requests on the production host without duplicating the hostname in every rule.

This does not require `RedirectRelative On`. That Apache 2.4.58+ directive controls whether the actual `Location` response header remains relative; it is not permitted directly in `.htaccess`. A leading-slash target is sufficient for portable `.htaccess` rules, even though Apache normally expands it to a fully qualified `Location` header.

There is one canonical-host trade-off. On a request to bare `jai-thai.com`, a path-only `Redirect` first preserves that host, and the existing host-canonicalization rule may then send a second redirect to `www.jai-thai.com`. Keeping fully qualified destinations avoids that extra hop. If local portability matters more, use path-only destinations and test both bare-domain and `www` behavior; if single-hop canonical production redirects matter more, keep the canonical host in production configuration rather than application-wide rules.

No redirect change has been made as part of this documentation inventory.

## Proposed V2 Canonical URL Contract

These are the proposed public canonical paths for v2. They deliberately describe content rather than exposing CodeIgniter controller or method names. V1 should keep its current behavior during the final month; both the `.php` and controller-style sources should redirect directly to these destinations at v2 launch.

### General and Restaurant Pages

| V1 source URLs | Proposed v2 canonical URL | Content |
| --- | --- | --- |
| `/`, `/jtpages`, `/jtpages/index` | `/` | Home |
| `/restaurant-menu.php`, `/jtpages/restaurantmenu` | `/restaurant-menu` | Restaurant-menu landing page |
| `/menu-family-set.php`, `/jtpages/menufamilyset` | `/restaurant-menu/family-sets` | Family sets |
| `/menu-individual-set.php`, `/jtpages/menuindividualset` | `/restaurant-menu/individual-sets` | Individual sets |
| `/menu-jaithai.php`, `/jtpages/menujaithai` | `/restaurant-menu/jai-thai` | Jai Thai restaurant menu |
| `/menu-vegetarian.php`, `/jtpages/menuvegetarian` | `/restaurant-menu/vegetarian` | Vegetarian restaurant menu |
| `/catering-menu.php`, `/jtpages/cateringmenu` | `/catering` | Catering landing page |
| `/about-achievements.php`, `/jtpages/aboutachievements` | `/about/achievements` | Achievements |
| `/about-history.php`, `/jtpages/abouthistory` | `/about/history` | History |
| `/about-outlets.php`, `/jtpages/aboutoutlets` | `/about/outlets` | Outlets |
| `/jtpages/terms` | `/terms` | Terms |
| `/jtpages/remembrance` | `/remembrance` | Remembrance page, if retained |
| `/jtpages/promo` | `/promotions` | Promotions page, if retained |

`/about-employment.php` currently redirects to the home page even though employment content is retired. V2 should return 410 or redirect to a real careers page only if one exists.

### Current Catering Collection

| V1 source URLs | Proposed v2 canonical URL | Content |
| --- | --- | --- |
| `/catering-menu-a.php`, `/jtmenu/cateringmenua` | `/catering/set-menu-a` | Set Catering Menu A |
| `/catering-menu-b.php`, `/jtmenu/cateringmenub` | `/catering/set-menu-b` | Set Catering Menu B |
| `/catering-menu-c.php`, `/jtmenu/cateringmenuc` | `/catering/set-menu-c` | Set Catering Menu C |
| `/catering-menu-d.php`, `/jtmenu/cateringmenud` | `/catering/set-menu-d` | Set Catering Menu D |
| `/catering-diy-a.php`, `/jtmenu/cateringdiya` | `/catering/diy-menu-a` | DIY Catering Menu A |
| `/catering-diy-b.php`, `/jtmenu/cateringdiyb` | `/catering/diy-menu-b` | DIY Catering Menu B |
| `/catering-diy-c.php`, `/jtmenu/cateringdiyc` | `/catering/diy-menu-c` | DIY Catering Menu C |
| `/catering-diy-d.php`, `/jtmenu/cateringdiyd` | `/catering/diy-menu-d` | DIY Catering Menu D |
| `/vegetarian-menu-a.php`, `/jtmenu/vegetarianmenua` | `/catering/vegan-menu-a` | Vegan Catering Menu A |
| `/vegetarian-menu-b.php`, `/jtmenu/vegetarianmenub` | `/catering/vegan-menu-b` | Vegan Catering Menu B |
| `/vegetarian-menu-c.php`, `/jtmenu/vegetarianmenuc` | `/catering/vegan-menu-c` | Vegan Catering Menu C |
| `/jtmenu/vegetarianmenud` | `/catering/vegan-menu-d` | Vegan Catering Menu D |
| `/jtmenu/thaicelebration` | `/catering/mini-party/thai-celebration` | Thai Celebration set |
| `/jtmenu/chaiyo` | `/catering/mini-party/chaiyo` | Chaiyo set |
| `/jtmenu/sawasdee` | `/catering/mini-party/sawasdee` | Sawasdee set |
| `/jtmenu/chokdee` | `/catering/mini-party/chokdee` | Chokdee set |
| `/jtmenu/chaiyovegan` | `/catering/mini-party/vegan/chaiyo` | Chaiyo vegan set |
| `/jtmenu/sawasdeevegan` | `/catering/mini-party/vegan/sawasdee` | Sawasdee vegan set |
| `/jtmenu/chokdeevegan` | `/catering/mini-party/vegan/chokdee` | Chokdee vegan set |
| `/mini-parties.php`, `/jtmenu/minipartyalacarte` | `/catering/mini-party/diy` | Mini Party DIY |
| `/catering-bento-set.php`, `/jtmenu/bento` | `/catering/bento` | Bento sets |

The retired generic `/mini-parties-package.php` and `/jtmenu/minipartyset` routes should map to a genuine v2 mini-party landing page only if that page exists; otherwise return 410. `/catering-sanook-set.php` and `/jtmenu/sanook` should be treated the same way if Sanook is not carried into v2.

### Seasonal Menus

| V1 source URL | Proposed v2 canonical URL |
| --- | --- |
| `/cnymenu/cnyjoy` | `/seasonal/chinese-new-year/joy` |
| `/cnymenu/cnyfortune` | `/seasonal/chinese-new-year/fortune` |
| `/cnymenu/cnyprosperity` | `/seasonal/chinese-new-year/prosperity` |
| `/cnymenu/cnyfamilyset` | `/seasonal/chinese-new-year/family-set` |
| `/cnymenu/cnyaddons` | `/seasonal/chinese-new-year/add-ons` |
| `/cnymenu/yusheng` | `/seasonal/chinese-new-year/yusheng` |
| `/xmasmenu/xmascatering` | `/seasonal/christmas/catering` |
| `/xmasmenu/xmasminiparty` | `/seasonal/christmas/mini-party` |
| `/specialmenu/mothersday` | `/seasonal/mothers-day` |

Seasonal URLs that are stale in v1 should return 404 or 410 unless their content is intentionally recreated in v2. Avoid redirecting different retired seasonal menus to an unrelated generic page.

### Cart and Customer Actions

| V1 source URLs | Proposed v2 endpoint | Migration note |
| --- | --- | --- |
| `/cart.php`, `/cart` | `/cart` | Canonical browser page and submission target |
| `/orderplaced.php`, `/cart/orderplaced` | `/checkout/complete` | Session-dependent completion page; do not treat as indexable |
| `/acknowledgeorder.php?oh={hash}`, `/cart/acknowledgeorder?oh={hash}` | `/orders/acknowledge?token={token}` | V2 must support the new token contract before redirecting old emailed links |
| `/leavefeedback.php?oh={hash}`, `/cart/leavefeedback?oh={hash}` | `/orders/feedback?token={token}` | V2 must preserve already-issued links or provide a compatibility lookup |
| `/cart/paypalcancel` | `/checkout/payment/cancel` | Configure PayPal to use the v2 URL directly |
| `/cart/paypalreturn` | `/checkout/payment/return` | Configure PayPal to use the v2 URL directly |
| `/cart/paypalipn` | `/integrations/paypal/ipn` | Machine callback; update PayPal configuration rather than relying on a redirect |

Cart mutations such as clear, change, remove, upsells, and menu submissions are application endpoints rather than indexable pages. V2 should generate them through named routes and accept only the intended HTTP methods; they do not need SEO redirects.

### Browser-Service Endpoints

| V1 source URL | Proposed v2 endpoint |
| --- | --- |
| `/ajax/checkpostalsurcharge/{postalCode}` | `/api/postal-codes/{postalCode}/surcharge` |
| `/ajax/getpostaladdress/{postalCode}` | `/api/postal-codes/{postalCode}/address` |

The v1 `/api/orders/*`, `/cron/*`, `/kianann/*`, and `/jtadmin/*` routes are not public page contracts. V2 should define authenticated API, scheduler, utility, and `/admin` route groups from its own requirements rather than preserving controller-derived names. Operator bookmarks may receive targeted redirects after the v2 administration workflows are finalized, but state-changing requests must not depend on redirects.

## V2 Launch Checklist

1. Export recent production access logs, analytics landing pages, Search Console links, and any sitemap before freezing the mapping.
2. Compare that evidence with every source URL in this document and add missing externally used paths.
3. Implement and test every canonical v2 page before enabling redirects.
4. Update v2 navigation, forms, emails, PDFs, payment settings, callbacks, and JavaScript to use v2 routes directly.
5. Redirect each old `.php` and controller-style GET page directly to its final destination in one hop.
6. Preserve query strings only where the destination explicitly accepts them.
7. Add self-referencing canonical tags and publish a sitemap containing only the final indexable URLs.
8. Verify 200, 301, 404, and 410 responses with an automated matrix before launch.
9. Monitor 404s, redirect traffic, Search Console, order completion, payment callbacks, and customer email links after launch.
10. Retain useful permanent redirects for at least one year and preferably indefinitely.

## Maintenance Checklist

When a route is added, removed, or renamed:

1. Update the appropriate table in this document.
2. Preserve a legacy alias when search engines, emails, bookmarks, or customer records may still contain the old URL.
3. Prefer generating current internal links with `site_url()`.
4. Test both the native URL and its legacy alias locally before deploying.
5. Verify each 301 with headers, not only the final browser page, because browsers cache permanent redirects aggressively.
6. Confirm that action, API, cron, and developer routes have explicit authentication or a server-level restriction.
