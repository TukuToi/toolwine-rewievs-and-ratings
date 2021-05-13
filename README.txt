=== ToolWine Reviews & Ratings ===
Contributors: bedas
Donate link: https://www.tukutoi.com/
Tags: ToolWine Add-On, ratings, reviews, Toolset Types, Toolset Forms
Requires at least: 5.7
Tested up to: 5.7
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

=== Usage ===

1. Make sure you have Toolset Types and Forms Installed (required). Views is recommended.
2. Upload and activate like any other plugin.
3. Create following post Type manually `user-rating` 
4. Create following Toolset Fields (type: number) and assign those to the Post Types that will be rated:
	- `single-total-rating` Stores the total of ratings given to a post (total rating, not average, of a book, or else).
	- `single-total-votes` Stores the total of votes given to a post (how many people voted for a book, or else)
	- `single-average-rating` Stores the average of all ratings given to a post (the average rating for a book, or else)
	- `reccomend-average-rating` Stores the average of all Recommends given to a post (the average Recommend for a book, or else)
	- `reccomend-total-rating` Stores the total of all Recommends given to a post (the total Recommends for a book, or else)
5. Create following Toolset Fields (type: number) and assign those to the Post Type `user-rating`
	- `single-rating-average` Stores the average of rating added in a single user rating post (the average rating of a rating post)
	- `belongs-to` Stores the ID of the post that was rated with this current rating (to what post does the user rating belong to)
6. Create a CRED Form to add new `user-rating` posts, follow [this doc](https://www.tukutoi.com/doc/how-to-create-a-rating-system-using-toolset/ to create the star inputs) in order to create the proper rating inputs. Name your Custom Inputs as follows: `rate1`, `rate2`, `rate3`, `rate4`, `rate5`, `rate6` and a last `rate_racc`
7. Insert the CRED form like shown below to a post that shall be rated.

<code>
<!-- Add Rating System -->
<!-- User has Not Rated This Post -->
[wpv-conditional if="( '[has_user_reviewed]' eq 'has_not_rated' )"]
  [cred_form form="add-rating-books"]
[/wpv-conditional]
<!-- User has Rated This Post -->
[wpv-conditional if="( '[has_user_reviewed]' eq 'has_rated' )"]
  <!-- Let the user delete his rating -->
  [cred-delete-post action='delete' onsuccess='[wpv-post-id]' item='[rating_to_delete]']Delete This Rating[/cred-delete-post]
[/wpv-conditional]
</code>
8. You may later display ratings in a View, and sort posts by their rating fields as you wish.

By default the plugin works with ONE CRED Form with ID `7199`. You can however create as many Forms you like.
Just make sure to add/change the Form IDs in `/public/class-tw-rar-public.php`, method `set_rating_forms`

The plugin will automatically connect the review to the post in which the form is added. 
It will automtically average all ratings from the fields (point 6 above) and then add the rating to the rated post. When more than one rating is submitted by different users, it will as well automatically average those in the rated post.

If a rating is deleted, the plugin will automatically make sure the rating is discounted from the rated post.

The plugin already differentiates between a set of 6 "ratings" and one "recommendation" input. 

The plugin provides 3 ShortCodes as well:
- `has_user_reviewed` (Returns string `has_not_rated` or `has_rated` depending if current logged in user rated current post)
- `rating_to_delete` (returns Post ID of the Rating of the current user<>current post, useful for delete actions)
- `format_and_round` (enclosing shortcode that can round up, and change formats of floast)

For first 2 ShortCodes see usage example in step 7 above.
For `format_and_round` see here
`[format_and_round round="3" d_sep="," k_sep="."]ANY FLOAT VALUE[/format_and_round]`

Assuming `ANY FLOAT VALUE` above will be `2.5649` this would return `2,565`

Arguments are `d_sep` and `k_sep` to determine separators for decimal and thousand while `round` can be used to determine how many decimals to use.

== Changelog ==

= 1.2.0 =
* Added "Insert Rating Fields" Button in CRED Forms (Text/Expert Mode)
 
= 1.1.0 =
* Introduced Filters to pass custom fields and forms to the core code.
 
= 1.0.0 =
* Initial release.
