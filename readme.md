**ToolWine Reviews & Ratings**

Contributors: bedas

Donate link: https://www.tukutoi.com/

Tags: ToolWine Add-On, ratings, reviews, Toolset Types, Toolset Forms

Requires at least: 5.7

Tested up to: 5.7

Stable tag: 1.0.0

License: GPLv2 or later

License URI: http://www.gnu.org/licenses/gpl-2.0.html

Upload and activate like any other plugin.

Plugin reuqires Toolset Types and Forms.

Plugin requires following post Type to be created:
`user-rating` (The post type that actually holds the users reviews.)

Plugin requires following Toolset Fields created (type: number):
**Posts to be rated Post Fields**

`single-total-rating` Stores the total of ratings given to a post (total rating, not average, of a book, or else).

`single-total-votes` Stores the total of votes given to a post (how many people voted for a book, or else)

`single-average-rating` Stores the average of all ratings given to a post (the average rating for a book, or else)

`reccomend-average-rating` Stores the average of all Recommends given to a post (the average Recommend for a book, or else)

`reccomend-total-rating` Stores the total of all Recommends given to a post (the total Recommends for a book, or else)

**user-rating Post Type Post Fields**

`single-rating-average` Stores the average of rating added in a single user rating post (the average rating of a rating post)

`belongs-to` Stores the ID of the post that was rated with this current rating (to what post does the user rating belong to)

**Usage**

Intended to work inside a single Post which has to be rated.
Create a CRED Form for new user-rating posts, follow this doc https://www.tukutoi.com/doc/how-to-create-a-rating-system-using-toolset/ to create the star inputs.
Then insert CRED form like shown below to a post that shall be rated.

```
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
```

You may later display ratings in Views, and sort posts by their rating fields.

By default addresses only ONE CRED Form with ID `7199`
This can be edited/changed in `/public/class-tw-rar-public.php`, method `set_rating_forms`

Note that the plugin assumes all fields to be existing like aboveshown.

Further customization is possible of course, either contact me, or customize on your own in a Fork.
