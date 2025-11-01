# Posts By Tag for WordPress

This is a simple plugin, inspired by the original Posts By Tag by Sudar Muthu, but much simpler.

It uses the same shortcode (posts-by-tag) and has the same configurable parameters, but it has no settings screen and no
other configurational options.

## Usage

`[posts-by-tag order_by="date" order="asc" count="5" tag="electronics"]`

- `order_by`: can
  contain [any valid value](https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters) used
  in the `WP_Query` `orderby` parameter.
- `order`: either `ASC` or `DESC`.
- `count`: the number of posts to show.
- `tag`: the tag to show posts for.