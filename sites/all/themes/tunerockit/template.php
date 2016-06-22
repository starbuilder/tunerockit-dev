<?php


    /**
     *	Preprocess function to determine number of columns for main content area.
     **/
    function tunerockit_preprocess_page(&$variables) {
    
    
  if (arg(0) == 'taxonomy' && arg(1) == 'term' )
  {
    $term = taxonomy_term_load(arg(2));
    $vocabulary = taxonomy_vocabulary_load($term->vid);
    $variables['theme_hook_suggestions'][] = 'page__taxonomy_vocabulary_' . $vocabulary->machine_name;
  }
      if (isset($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type;

  }  
    
    
    

    if (arg(0) == 'user') {
    switch (arg(1)) {
      case NULL:
        if (!user_is_logged_in()) drupal_set_title(t('Log in'));
        break;
      case 'register':
        drupal_set_title(t('Register for an Artist account'));
        break;
      case 'password':
        drupal_set_title(t('Request new password'));
        break;
      case 'login':
        drupal_set_title(t('Log in'));
        break;
    }
  }
        
  
        if (!empty($variables['page']['left']) && !empty($variables['page']['right'])) {
            $variables['main_columns'] = 'large-6';
        } elseif (!empty($variables['page']['left']) || !empty($variables['page']['right'])) {
            $variables['main_columns'] = 'large-9';
        } elseif (empty($variables['page']['left']) && empty($variables['page']['right'])) {
            $variables['main_columns'] = 'large-12';
        }
    }

    /**
     * Overwrite theme_button().
     */
    function tunerockit_button($variables)
    {
        $element = $variables['element'];
        $element['#attributes']['type'] = 'submit';
        element_set_attributes($element, array('id', 'name', 'value'));
        $element['#attributes']['class'][] = 'form-'.$element['#button_type'];
        if (!empty($element['#attributes']['disabled'])) {
            $element['#attributes']['class'][] = 'form-button-disabled';
        }
        //custom class
        $element['#attributes']['class'][] = 'button';
        $element['#attributes']['class'][] = 'small';
        $element['#attributes']['class'][] = 'radius';

        return '<input'.drupal_attributes($element['#attributes']).' />';
    }

    /**
     * Override theme_breadcrumb().
     **/
    function tunerockit_breadcrumb($variables)
    {
        $breadcrumb = $variables['breadcrumb'];
        if (!empty($breadcrumb)) {
            $output = '<ul class="breadcrumbs">';
            foreach ($breadcrumb as $value) {
                $output .= '<li>'.$value.'</li>';
            }
            $output .= '</ul>';

            return $output;
        }
    }

    /**
     *	Override theme_status_messages().
     **/
    function tunerockit_status_messages($variables)
    {
        $display = $variables['display'];
        $output = '';
        $status_heading = array(
            'status' => t('Status message'),
            'error' => t('Error message'),
            'warning' => t('Warning message'),
        );

        foreach (drupal_get_messages($display) as $type => $messages) {
            //convert to tunerockit classes
            switch ($type) {
                case 'error': $type = 'alert';
                break;

                case 'status': $type = 'success';
                break;

                case 'warning': $type = 'warning';
                break;
            }

            $output .= "<div class=\"callout $type\" data-closable>";
            if (!empty($status_heading[$type])) {
                $output .= '<h2 class="element-invisible">'.$status_heading[$type].'</h2>';
            }
            if (count($messages) > 1) {
                $output .= ' <ul>';
                foreach ($messages as $message) {
                    $output .= '  <li>'.$message.'</li>';
                }
                $output .= ' </ul>';
            } else {
                $output .= $messages[0];
            }
            $output .= '<button class="close-button" aria-label="Close alert" type="button" data-close><span aria-hidden="true">&times;</span></button></div>';
        }

        return $output;
    }

    /**
     *	Override theme_menu_local_task().
     **/
    function tunerockit_menu_local_task($variables)
    {
        $link = $variables['element']['#link'];
        $link_text = $link['title'];
        if (!empty($variables['element']['#active'])) {
            // Add text to indicate active tab for non-visual users.
            $active = '<span class="element-invisible">'.t('(active tab)').'</span>';
            // If the link does not contain HTML already, check_plain() it now.
            // After we set 'html'=TRUE the link will not be sanitized by l().
            if (empty($link['localized_options']['html'])) {
                $link['title'] = check_plain($link['title']);
            }
            $link['localized_options']['html'] = true;
            $link_text = t('!local-task-title!active', array('!local-task-title' => $link['title'], '!active' => $active));
        }

        return '<dd'.(!empty($variables['element']['#active']) ? ' class="tabs-title is-active"' : ' class="tabs-title"').'>'.l($link_text, $link['href'], $link['localized_options'])."</dd>\n";
    }
    
  