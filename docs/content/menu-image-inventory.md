# Catering Menu Image Inventory

**Status:** Existing-menu replacements implemented; new Vegan Catering Menu D and KIV assets remain pending

**Recorded:** 2026-10-01

**Related milestone:** [`../milestones/M3.1-menu-requirements-and-content-inventory.md`](../milestones/M3.1-menu-requirements-and-content-inventory.md)

## Scope

This inventory records the use of every image originally supplied under `inbox/pending/new-images/` and now preserved under `inbox/processed/`. On 2026-10-01, the 15 source images assigned to existing menus were visually reviewed, copied unchanged into `src/assets/i/catering-menu/`, and wired into every corresponding card occurrence.

All 20 supplied image files are accounted for below: 15 are implemented for existing menus, one is reserved for the future Vegan Catering Menu D, and four are marked KIV.

## Approved Replacements

| Processed source image | Intended menu destination | Current application reference or implementation note |
| --- | --- | --- |
| `20261001112919-bento.jpg` | Bento Set Menu | Implemented as `bento.jpg`. |
| `20261001112919-diy-catering-menu-a.jpg` | DIY Catering Menu A | Implemented as `diy-catering-menu-a.jpg`. |
| `20261001112919-diy-catering-menu-b.jpg` | DIY Catering Menu B | Implemented as `diy-catering-menu-b.jpg`. |
| `20261001112919-diy-catering-menu-c.jpg` | DIY Catering Menu C | Implemented as `diy-catering-menu-c.jpg`. |
| `20261001112919-diy-catering-menu-d.jpg` | DIY Catering Menu D | Implemented as `diy-catering-menu-d.jpg`. |
| `20261001112919-mini-party-diy.jpg` | Mini Party DIY Menu | Implemented as `mini-party-diy.jpg`. |
| `20261001112919-mini-party-sets.jpg` | Thai Celebration, Chaiyo, Sawasdee, and Chokdee set menus | Implemented as the shared `mini-party-sets.jpg` asset for every card occurrence. |
| `20261001112919-set-catering-menu-a.jpg` | Set Catering Menu A | Implemented as `set-catering-menu-a.jpg`. |
| `20261001112919-set-catering-menu-b.jpg` | Set Catering Menu B | Implemented as `set-catering-menu-b.jpg`. |
| `20261001112919-set-catering-menu-c.jpg` | Set Catering Menu C | Implemented as `set-catering-menu-c.jpg`. |
| `20261001112919-set-catering-menu-d.jpg` | Set Catering Menu D | Implemented as `set-catering-menu-d.jpg`. |
| `20261001112919-vegan-catering-menu-a.jpg` | Vegan Catering Menu A | Implemented as `vegan-catering-menu-a.jpg`. |
| `20261001112919-vegan-catering-menu-b.jpg` | Vegan Catering Menu B | Implemented as `vegan-catering-menu-b.jpg`. |
| `20261001112919-vegan-catering-menu-c.jpg` | Vegan Catering Menu C | Implemented as `vegan-catering-menu-c.jpg`. |
| `20261001112919-vegan-catering-menu-d.jpg` | New Vegan Catering Menu D | Pending creation of the new Menu D route and card. |
| `20261001112919-vegan-mini-party-sets.jpg` | Chaiyo Vegan, Chokdee Vegan, and Sawasdee Vegan menus | Implemented as the shared `vegan-mini-party-sets.jpg` asset for every card occurrence. |

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

## Implementation Record

- Preserve each processed source image unchanged as provenance.
- The 15 implemented application assets are byte-for-byte copies of their processed source files and retain their supplied 1280×720 JPEG format.
- Every repeated card occurrence uses the appropriate shared non-vegan or vegan mini-party image.
- New filenames avoid serving a previously cached image under an old URL.
- Image `alt` and `title` text identifies the corresponding menu rather than describing the retired image.
- Do not activate any KIV image without a later explicit placement decision.
- Image replacement must not change menu names, pricing, routes, or ordering behaviour.
