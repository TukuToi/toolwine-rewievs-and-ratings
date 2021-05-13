<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.tukutoi.com/
 * @since      1.0.0
 *
 * @package    Tw_Rar
 * @subpackage Tw_Rar/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tw_Rar
 * @subpackage Tw_Rar/public
 * @author     TukuToi <hello@tukutoi.com>
 */
class Tw_Rar_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name 	The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The fields prefix.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $prefix    Toolset Custom Fields Prefix.
	 */
	private $prefix;

	/**
	 * User-Rating Average Rating Field.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int    $single_avrg_field 	The Single User-Rating Post Average rating field slug.
	 */
	private $single_avrg_field;

	/**
	 * The Belongs To Field.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int    $belongs_to 	To which Post the User-Rating Belongs to field slug.
	 */
	private $belongs_to;

	/**
	 * The Rated Post Average Rating Field.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int    $post_avrg_field 	The Rated Post Average rating field slug.
	 */
	private $post_avrg_field;

	/**
	 * The Rated Post Total Votes Field.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int    $post_all_votes 	The Rated Post Total Amount of Votes field slug.
	 */
	private $post_all_votes;

	/**
	 * The Rated Post Total Ratings Field.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int    $post_total 	The Rated Post Total of all Ratings field slug.
	 */
	private $post_total;

	/**
	 * The Rated Post Recommend Average Field.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int    $rec_avrg_rating 	The Rated Post Average of all Recommendations field slug.
	 */
	private $rec_avrg_rating;

	/**
	 * The Rated Post Total Recommendations Field.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      int    $rec_total_rating 	The Rated Post Total of all Recommendations field slug.
	 */
	private $rec_total_rating;

	/**
	 * The Form IDs.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $forms    All Form IDs to which the code shall apply to.
	 */
	private $forms;

	/**
	 * The Form Rating Fields.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $fields    All Form $_POST Fields used for Rating Inputs.
	 */
	private $fields;

	/**
	 * The Form Recommendation Field.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $recommend_fields    The Form $_POST Field used for Recommend Inputs.
	 */
	private $recommend_fields;

	/**
	 * The User Rating Post Type.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rating_cpt    The User Rating Post Type.
	 */
	private $rating_cpt;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name 			= $plugin_name;
		$this->version 				= $version;

		$this->rating_cpt 			= apply_filters( 'tw_rar_cpt',  'user-rating' );

		$this->prefix 				= 'wpcf-';

		//All filters @since 1.1.0
		$this->single_avrg_field	= apply_filters( 'tw_rar_sra',  $this->prefix .'single-rating-average' );
		$this->belongs_to 			= apply_filters( 'tw_rar_bt',  $this->prefix .'belongs-to' );

		$this->post_avrg_field 		= apply_filters( 'tw_rar_sar',  $this->prefix .'single-average-rating' );
		$this->post_all_votes 		= apply_filters( 'tw_rar_stv',  $this->prefix .'single-total-votes' );
		$this->post_total 			= apply_filters( 'tw_rar_str',  $this->prefix .'single-total-rating'); 

		$this->rec_avrg_rating 		= apply_filters( 'tw_rar_rar',  $this->prefix .'recommend-average-rating' );
		$this->rec_total_rating 	= apply_filters( 'tw_rar_rtr',  $this->prefix .'recommend-total-rating' );

		$this->forms 				= $this->set_rating_forms();

		$this->fields 				= $this->set_rating_fields();
		$this->recommend_fields 	= $this->set_recommend_fields();

	}

	/**
	 * Set Rating Fields Name and Slugs.
	 * 
	 * @since   1.0.0
	 * @return 	array 	$fields 	array pairs with Tooslet Rating Field Slugs and Form Field Slugs.
	 */
	private function set_rating_fields(){

		$fields = array(
			'rating1' 	=> 'rate1',
			'rating2' 	=> 'rate2',
			'rating3' 	=> 'rate3',
			'rating4' 	=> 'rate4',
			'rating5' 	=> 'rate5',
			'rating6' 	=> 'rate6',
		);

		//array('types_field_name' => 'form_input_name')
		//@since 1.1.0
		$fields = apply_filters( 'tw_rar_rating_fields', $fields );

		return $fields;

	}

	/**
	 * Set Rating Fields Name and Slugs.
	 *
	 * Note: returns array only for ease of usage in existing methods.
	 * Should never return more than one array key.
	 *
	 * @since   1.0.0
	 * @return 	array 	$fields 	array pairs with Tooslet Recommend Field Slug and Form Field Slugs.
	 */
	private function set_recommend_fields(){

		$fields = array(
			'recommend' => 'rate_racc',	
		);

		//array('types_field_name' => 'form_input_name')
		//@since 1.1.0
		$fields = apply_filters( 'tw_rar_recommend_field', $fields );

		return $fields;

	}

	/**
	 * Set Form names and IDs that are used for ratings.
	 * 
	 * @since   1.0.0
	 * @return 	array 	$forms 	the array pairs unique form identifier and Form ID.
	 */
	private function set_rating_forms(){

		$forms = array(
			'books_ratings' => 7199,
		);

		//array('form_name' => FORM_ID )
		//@since 1.1.0
		$forms = apply_filters( 'tw_rar_forms', $forms );

		return $forms;

	}

	/**
	 * Check if $_POST field is set iterator.
	 *
	 * @since   1.0.0
	 * @param 	$field_slug 	string 		Slug of the Field to be checked.
	 * @return 	bool 	true|false 	wether field is set or not.
	 */
	private function is_field_set($field_slug){

		if ( isset($_POST[$field_slug]) ){
			return true;
		}

		return false;

	}

	/**
	 * Clean Field Input
	 *
	 * @since   1.0.0
	 * @param 	$field_slug 	string 		Slug of the Field to be cleaned.
	 * @return 	int 	integer rating value or 0 if invalid.
	 */
	private function clean_field_vaue($field_slug){

		$value = 0;
		
		if( ctype_digit( strval( $_POST[$field_slug] ) ) === true )
			$value = $_POST[$field_slug];

		return $value;
 
	}


	/**
	 * Get all Reviews by user and post.
	 *
	 * @since   1.0.0
	 * @param   $user_id 	int 	the User ID.
	 * @param   $post_id 	int 	the Post ID.
	 * @return 	array 	WP_Query Results.
	 */
	private function all_reviews_by_user_and_post($user_id, $post_id){

		$args = array(
			'post_status' 	=> 'publish',
		    'post_type' 	=> array( $this->rating_cpt ),
		    'author' 		=> $user_id,
		    'meta_key'   	=> $this->belongs_to,
    		'meta_value' 	=> $post_id,
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() )
			return $query->posts;
		
		return array();

	}

	/**
	 * Update Rating Metas
	 *
	 * @param   $avrg_array 	array 	array of int values from validated and cleaned $_POST fields.
	 * @param   $post_id 		int 	User-Rating Post ID.
	 * @param   $form_data 		array 	array of CRED Form data.
	 * @since   1.0.0
	 * @return  void
	 */
	private function update_rating_metas( $avrg_array, $post_id, $form_data){

		//Single User-Rating Post Rating Average.
	    $avrg = array_sum($avrg_array) / count($avrg_array);

	    //Update Average of this Single User-Rating Post.
	   	update_post_meta( $post_id, $this->single_avrg_field, $avrg );

	    //Connect this Single User-Rating Post to the reviewed Post.
		update_post_meta( $post_id, $this->belongs_to, $form_data['container_id'] );

		//Update rated Post with one more vote (+1 vote)
		$existing_votes = get_post_meta($form_data['container_id'], $this->post_all_votes, true);
		$existing_votes = empty($existing_votes) ? 0 : $existing_votes;
		update_post_meta( $form_data['container_id'], $this->post_all_votes, $existing_votes + 1);

		//Update rated Post with new Average Rating (current average + existing average)
		//Update rated Post with new Total Ratings.
		$existing_total = get_post_meta($form_data['container_id'], $this->post_total, true);
		$existing_total = empty($existing_total) ? 0 : $existing_total;
		$new_average = ($existing_total + $avrg) / ($existing_votes + 1);
		update_post_meta( $form_data['container_id'], $this->post_avrg_field, $new_average );
		update_post_meta( $form_data['container_id'], $this->post_total, $existing_total + $avrg );	

	}

	/**
	 * Update Recommend Metas
	 *
	 * @param   $avrg_array 	array 	array of int values from validated and cleaned $_POST fields.
	 * @param   $post_id 		int 	User-Rating Post ID.
	 * @param   $form_data 		array 	array of CRED Form data.
	 * @since   1.0.0
	 * @return  void
	 */
	private function update_recommend_metas( $avrg_array, $post_id, $form_data){

		//Single User-Rating Post Recommend value.
	    $avrg = array_sum($avrg_array);//No need to divide by number fields as there is only one value.

		//Get rated Post votes (was updated in update_rating_metas() already)
		$existing_votes = get_post_meta($form_data['container_id'], $this->post_all_votes, true);
		
		//Update rated Post new Recommend Average (current value + existing average)
		//Update post with new total of Recommend values.
		$existing_total = get_post_meta($form_data['container_id'], $this->rec_total_rating, true);
		$existing_total = empty($existing_total) ? 0 : $existing_total;
		$new_average = ($existing_total + $avrg) / ($existing_votes);
		update_post_meta( $form_data['container_id'], $this->rec_avrg_rating, $new_average );
		update_post_meta( $form_data['container_id'], $this->rec_total_rating, $existing_total + $avrg );	

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		

	}

	/**
	 * Update the User-Rating Fields and Rated Post On new Rating.
	 *
	 * @param   $post_id 		int 	User-Rating Post ID.
	 * @param   $form_data 		array 	array of CRED Form data.
	 * @since   1.0.0
	 * @return  void
	 */
	public function update_rating_and_post($post_id, $form_data){

	    if ( in_array($form_data['id'], $this->forms) ){

	    	$avrg_array = array();

	    	foreach($this->fields as $key => $value) {

	    		if( $this->is_field_set($value) === true ){

	    			$rating = $this->clean_field_vaue($value);
	    			$avrg_array[] = $rating;

	    			//Update the rating post field values
	    			update_post_meta( $post_id, $this->prefix.$key, $rating );

	    		}

	    	}

	    	//Update rating metas of rated post.
	    	$this->update_rating_metas( $avrg_array, $post_id, $form_data);

	    }
	}

	/**
	 * Update the Recommendation Field to the Rating Post
	 *
	 * @param   $post_id 		int 	User-Rating Post ID.
	 * @param   $form_data 		array 	array of CRED Form data.
	 * @since   1.0.0
	 * @return  void
	 */
	public function update_recommendation_and_post($post_id, $form_data){

	    if ( in_array($form_data['id'], $this->forms) ){

	    	$avrg_array = array();

	    	foreach($this->recommend_fields as $key => $value) {

	    		if( $this->is_field_set($value) === true ){

	    			$rating = $this->clean_field_vaue($value);
	    			$avrg_array[] = $rating;

	    			//Update the Recommendation post field value
	    			update_post_meta( $post_id, $this->prefix.$key, $rating );

	    		}

	    	}

	    	//Update Recommendation metas of rated post.
	    	$this->update_recommend_metas( $avrg_array, $post_id, $form_data);

	    }
	}

	/**
	 * Delete the Rating Post, meta and related post data.
	 *
	 * @param   $url 		int 	CRED Redirect URL.
	 * @param   $post_id 	array 	post ID being deleted. 
	 * @since   1.0.0
	 * @return  $url 	string 	The URL redirect for CRED.
	 */
	public function delete_rating_and_post($url, $post_id){

		//Get all Meta of current rating being deleted.
	    $meta 				 = get_post_meta($post_id);
	    //Get the Post that was rated
	    $post_rated 		 = get_post_meta($post_id, $this->belongs_to, true);
	    //Get this user-Rating Post rating average value
	    $single_avrg_field 	 = get_post_meta($post_id, $this->single_avrg_field, true);
	    //Get this user-Rating Post Recommend value
	    $single_rec_field 	 = get_post_meta($post_id, $this->prefix.array_key_first($this->recommend_fields), true);
	    //Get post Rated average rating value
	    $post_avrg_field 	 = get_post_meta($post_rated, $this->post_avrg_field, true);
	    //Get post rated average recommend value
	    $post_avrg_rec 	 	 = get_post_meta($post_rated, $this->rec_avrg_rating, true);
	    //get Post rated total votes
	    $post_all_votes 	 = get_post_meta($post_rated, $this->post_all_votes, true);
	    //Get Post rated total ratings
	    $post_total 		 = get_post_meta($post_rated, $this->post_total, true);
	    //Get post rated total recommend 
	    $post_total_rec 	 = get_post_meta($post_rated, $this->rec_total_rating, true);
	    //Create new Total ratings for post rated
	    $new_post_total 	 = $post_total - $single_avrg_field;
	    //Create new Total recommends for post rated
	    $new_rec_total 	 	 = $post_total_rec - $single_rec_field;
	    //Create new Total Votes for post rated
	    $new_post_all_votes  = $post_all_votes - 1;
	    //Create new Average for post rated
	    if( $new_post_all_votes  > 0 ){
	    	$new_post_avrg_field = $new_post_total / $new_post_all_votes;
		    //Create new Average for reccomend rated
		    $new_rec_avrg_field  = $new_rec_total / $new_post_all_votes;
	    }
	    elseif( $new_post_all_votes  == 0 ){
	    	$new_post_avrg_field = 0;
		    //Create new Average for reccomend rated
		    $new_rec_avrg_field  = 0;
	    }
	    

	    //Update the post rated with new data
	    update_post_meta( $post_rated, $this->post_total, $new_post_total );
	    update_post_meta( $post_rated, $this->rec_total_rating, $new_rec_total );
	    update_post_meta( $post_rated, $this->post_all_votes, $new_post_all_votes);
	    update_post_meta( $post_rated, $this->post_avrg_field, $new_post_avrg_field);
	    update_post_meta( $post_rated, $this->rec_avrg_rating, $new_rec_avrg_field);

	    //Delete all post meta of the rating being deleted.
	    foreach ($meta as $key => $value) {
	    	delete_post_meta( $post_id, $key);
	    }

	    //Even we did not touch this, it is a filter and needs to return something.
	    return $url;

	}

	/**
	 * ShortCode calback to check if user has reviewed current post
	 *
	 * @param   $atts 		array 	WordPress ShortCodes attributes.
	 * @since   1.0.0
	 * @return  string 	has_rated|has_not_rated 	wether the user rated this post.
	 */
	public function has_user_reviewed_shortcode($atts){

		global $post;

		$atts = shortcode_atts( 
			array(
				'user_id' => get_current_user_id(),
				'post_id' => $post->ID,
			), 
			$atts, 
			'has_user_reviewed' 
		);

		$reviews = $this->all_reviews_by_user_and_post($atts['user_id'],$atts['post_id']);

		foreach ($reviews as $key => $post_object) {

			if( !is_object($post_object) )
				return 'has_not_rated';

			$belongs_to = get_post_meta($post_object->ID, $this->belongs_to, true);

			if( $belongs_to == $atts['post_id'] )
				return 'has_rated';

		}

		return 'has_not_rated';

	}

	/**
	 * ShortCode calback to get post ID of the rating of current user/post
	 *
	 * @param   $atts 		array 	WordPress ShortCodes attributes.
	 * @since   1.0.0
	 * @return  $post_id 	int 	the Post ID of rating to delete.
	 */
	public function rating_current_user_post_shortcode($atts){

		global $post;

		$atts = shortcode_atts( 
			array(
				'user_id' => get_current_user_id(),
				'post_id' => $post->ID,
			), 
			$atts, 
			'rating_to_delete' 
		); 

		$reviews = $this->all_reviews_by_user_and_post($atts['user_id'],$atts['post_id']);

		$post_id = 0;

		foreach ($reviews as $key => $post_object) {

			if( !is_object($post_object) )
				return $post_id;

			$post_id = $post_object->ID;

		}

		return $post_id;

	}

	/**
	 * ShortCode calback to round and format numeric values.
	 *
	 * @param   $atts 		array 	WordPress ShortCodes attributes.
	 * @param 	$content 	mixed 	WordPress Enclosing ShortCode content.
	 * @since   1.0.0
	 * @return  $post_id 	int 	the Post ID of rating to delete.
	 */
	public function round_values_shortcode($atts, $content){

        //Build attributes
		$atts = shortcode_atts( 
			array(
				'round' 	=> 2,//by default we round 2 decimals
				'd_sep'	 	=> '.',//by default we use Dot as decimal separator
				'k_sep'		=> '\'',//by default we use ' as thousand separator
	 		), 
			$atts, 
			'round_values' 
		);
	        
	    //Expand eventual shortcodes in the ShortCode content. Use wpv_do_shortcode so it expands even nested shortcodes.
	    $content = wpv_do_shortcode($content);
	        
	    //if no numeric value was passed, then abort and throw a error.
		if( !is_numeric( $content ) ){
			$rounded_value = 'You passed non-numeric values to the shortcode!';
		}
		else{//all good
			$rounded_value = round($content, $atts['round']);//here we could add 3rd parameter to round up, down, even or odd
		}
	  
	    //format float to french format
	    $rounded_value = number_format($rounded_value, $atts['round'], $atts['d_sep'], $atts['k_sep']);

	    //return the rounded value
		return $rounded_value;

	}
	
	/**
	 * Register ShortCodes
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	public function register_shortcodes(){

		add_shortcode( 'has_user_reviewed', array( $this, 'has_user_reviewed_shortcode') );
		add_shortcode( 'rating_to_delete', array( $this, 'rating_current_user_post_shortcode') );
		add_shortcode( 'format_and_round', array( $this, 'round_values_shortcode') );

	}

}
