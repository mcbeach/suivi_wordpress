<?php
    /****cette fonction est Post thumbail(images a la une)******/
add_theme_support( 'post-thumbnails' );


add_action('init', 'my_custom_init');
function my_custom_init()
{
/* notre code PHP pour rajouter les custom post type */
register_post_type(
  'projet',
  array(
    'label' => 'Projets',/* correspond au nom du nouvel élément. Il sera utilisé dans les templates plus tard.*/
    'labels' => array(
      'name' => 'Projets',
      'singular_name' => 'Projet',
      'all_items' => 'Tous les projets',
      'add_new_item' => 'Ajouter un projet',
      'edit_item' => 'Éditer le projet',
      'new_item' => 'Nouveau projet',
      'view_item' => 'Voir le projet',
      'search_items' => 'Rechercher parmi les projets',
      'not_found' => 'Pas de projet trouvé',
      'not_found_in_trash'=> 'Pas de projet dans la corbeille'
      ),
    'public' => true,
    'capability_type' => 'post',
    'supports' => array(
      'title',
      'editor',
      'thumbnail'
    ),
    'has_archive' => true
  )
);
}
register_taxonomy(
  'type',
  'projet',
  array(
    'label' => 'Types',
    'labels' => array(
    'name' => 'Types',
    'singular_name' => 'Type',
    'all_items' => 'Tous les types',
    'edit_item' => 'Éditer le type',
    'view_item' => 'Voir le type',
    'update_item' => 'Mettre à jour le type',
    'add_new_item' => 'Ajouter un type',
    'new_item_name' => 'Nouveau type',
    'search_items' => 'Rechercher parmi les types',
    'popular_items' => 'Types les plus utilisés'
  ),
  'hierarchical' => true
  )
);
register_taxonomy(
  'couleur',
  'projet',
  array(
    'label' => 'Couleurs',
    'labels' => array(
    'name' => 'Couleurs',
    'singular_name' => 'Couleur',
    'all_items' => 'Toutes les couleurs',
    'edit_item' => 'Éditer la couleur',
    'view_item' => 'Voir la couleur',
    'update_item' => 'Mettre à jour la couleur',
    'add_new_item' => 'Ajouter une couleur',
    'new_item_name' => 'Nouvelle couleur',
    'search_items' => 'Rechercher parmi les couleurs',
    'popular_items' => 'Couleurs les plus utilisées'
  ),
  'hierarchical' => false
  )
);
register_taxonomy_for_object_type( 'type', 'projet' );
register_taxonomy_for_object_type( 'couleur', 'projet' );

/* rajouter des Widgets( pour aciver les Widget)*/

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="section">',
        'after_title' => '</h4>',
    ));
/* activer Post Formats*/
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

function bbx_add_editor_styles() {
add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'bbx_add_editor_styles' );

/*---------------------------*/
function bbx_columns( $column ) {
  unset( $column['author'] );
  $column['image'] = 'Image';
  $column['color'] = 'Couleur';
  return $column;
}
add_filter( 'manage_post_posts_columns', 'bbx_columns' );

/*  Définir le contenu des nouvelles colonnes  */

function bbx_rows( $column, $post_id ) {
  $custom_fields = get_post_custom( $post_id );
  switch ( $column ):
    case 'image':
      the_post_thumbnail( 'thumbnail' );
      break;
    case 'color':
      if ( $custom_fields['color'][0] != '' ):
        echo '#' . $custom_fields['color'][0] . '<br><span style="background: #' . $custom_fields['color'][0] . '; display: inline-block; height: 20px; width: 20px;"></span>';
      else:
        echo 'Pas de couleur définie';
      endif;
      break;
    default:
      break;
  endswitch;
}
add_action( 'manage_post_posts_custom_column', 'bbx_rows', 10, 2 );



