(function (wp) {


  wp.data.dispatch( 'core/notices' ).createNotice(
      'info', // Can be one of: success, info, warning, error.
      'Please add custom-fields support on your Custom Post Type to work with Gutenberg.', // Text string to display.
      {
        isDismissible: true, // Whether the user can dismiss the notice.
        // Any actions the user can perform.
        actions: [
          {
            url: 'https://developer.wordpress.org/reference/functions/add_post_type_support/',
            label: 'add_post_type_support'
          },
        ],
      }
  );


})(window.wp);