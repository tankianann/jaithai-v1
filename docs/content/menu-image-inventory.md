# Catering Menu Image Inventory

**Status:** Documented for later implementation

**Recorded:** 2026-10-01

**Related milestone:** [`../milestones/M3.1-menu-requirements-and-content-inventory.md`](../milestones/M3.1-menu-requirements-and-content-inventory.md)

## Scope

This inventory records the intended use of every image originally supplied under `inbox/pending/new-images/` and now preserved under `inbox/processed/`. The images have not been visually reviewed, modified, optimized, copied into application assets, or wired into PHP views. Those actions belong to a later explicitly approved implementation step.

All 20 supplied image files are accounted for below: 16 have approved menu destinations and four are marked KIV.

## Approved Replacements

| Processed source image | Intended menu destination | Current application reference or implementation note |
| --- | --- | --- |
| `20261001112919-bento.jpg` | Bento Set Menu | Replace the current Bento card image referenced as `bentoset.jpg`. |
| `20261001112919-diy-catering-menu-a.jpg` | DIY Catering Menu A | Replace the current A card image referenced as `diycateringmenu-a.jpg`. |
| `20261001112919-diy-catering-menu-b.jpg` | DIY Catering Menu B | Replace the current B card image referenced as `diycateringmenu-b.jpg`. |
| `20261001112919-diy-catering-menu-c.jpg` | DIY Catering Menu C | Replace the current C card image referenced as `diycateringmenu-c.jpg`. |
| `20261001112919-diy-catering-menu-d.jpg` | DIY Catering Menu D | Replace the current D card image referenced as `diycateringmenu-d.jpg`. |
| `20261001112919-mini-party-diy.jpg` | Mini Party DIY Menu | Replace the current Mini Party DIY card image referenced as `miniparty-alacarte.jpg`. |
| `20261001112919-mini-party-sets.jpg` | Thai Celebration, Chaiyo, Sawasdee, and Chokdee set menus | Use this shared supplied image for every card occurrence of these four non-vegan set menus. |
| `20261001112919-set-catering-menu-a.jpg` | Set Catering Menu A | Replace the current A card image referenced as `setcateringmenu-a.jpg`. |
| `20261001112919-set-catering-menu-b.jpg` | Set Catering Menu B | Replace the current B card image referenced as `setcateringmenu-b.jpg`. |
| `20261001112919-set-catering-menu-c.jpg` | Set Catering Menu C | Replace the current C card image referenced as `setcateringmenu-c.jpg`. |
| `20261001112919-set-catering-menu-d.jpg` | Set Catering Menu D | Replace the current D card image referenced as `setcateringmenu-d.jpg`. |
| `20261001112919-vegan-catering-menu-a.jpg` | Vegan Catering Menu A | Replace the current A card image referenced as `vegetariancateringmenu-a.jpg`. |
| `20261001112919-vegan-catering-menu-b.jpg` | Vegan Catering Menu B | Replace the current B card image referenced as `vegetariancateringmenu-b.jpg`. |
| `20261001112919-vegan-catering-menu-c.jpg` | Vegan Catering Menu C | Replace the current C card image referenced as `vegetariancateringmenu-c.jpg`. |
| `20261001112919-vegan-catering-menu-d.jpg` | New Vegan Catering Menu D | Use for the new Menu D card introduced with the Vegan Supreme content. |
| `20261001112919-vegan-mini-party-sets.jpg` | Chaiyo Vegan, Chokdee Vegan, and Sawasdee Vegan menus | Use this shared supplied image for every card occurrence of these three vegan mini-party menus. |

## Keep in View

KIV means the source remains preserved and documented but has no approved application destination in the current menu-update implementation.

| Processed source image | Status | Notes |
| --- | --- | --- |
| `20261001112919-deepavali-family-feast.jpg` | KIV | No current implementation target. |
| `20261001112919-diy-catering.jpg` | KIV | Possible DIY collection-level image; placement not approved. |
| `20261001112919-set-catering.jpg` | KIV | Possible Set Catering collection-level image; placement not approved. |
| `20261001112919-vegan-catering.jpg` | KIV | Possible Vegan Catering collection-level image; placement not approved. |

## Existing Image Without a Replacement Instruction

The existing `Mini Party Set` card currently uses `miniparty-set.jpg`. The supplied `mini-party-sets.jpg` image is explicitly assigned to Thai Celebration, Chaiyo, Sawasdee, and Chokdee, so the existing Mini Party Set image remains unchanged unless a later instruction expands that mapping.

## Implementation Constraints

- Preserve each processed source image unchanged as provenance.
- Review visual content, dimensions, compression, crop, and accessibility text before copying any image into `src/assets/`.
- Update every repeated card occurrence for shared menu images, not only the first occurrence in `cateringmenu_view.php`.
- Do not activate any KIV image without a later explicit placement decision.
- Image replacement must not change menu names, pricing, routes, or ordering behaviour.
