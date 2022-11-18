    
<?php
/** 
 *  Il existe 4 types d'objets associés à l'API WP customizer la classe WP_customizer() : 
 *   Panels, Sections, Settings, et Controls.
 *  De la même façon qu'on enregistre un sidebar, on enregistrera notre foncton de personnalisation
 *  en spécifiant trois paramètres : la section, le setting, et le contrôle.
 *  
*/    
    add_action('customize_register', function(WP_Customize_Manager $manager){
        $manager->add_section("mon_theme_apparence", 
                            ["title"=>"Personnalisation du background"]);
      
        $manager->add_setting("site__title__background", 
                                ["default"=>"#aaa",
                                "sanitize_callback"=>"sanitize_hex_color"]);

       $manager->add_control(new WP_Customize_Color_Control($manager, "site__title__background",
                        ["section"=>"mon_theme_apparence",
                        "label"=>"Couleur du site__title" ]));


        $manager->add_setting("site__footer__background", 
                            ["default"=>"#aaa",
                            "sanitize_callback"=>"sanitize_hex_color"]);

        $manager->add_control(new WP_Customize_Color_Control($manager, "site__footer__background",
                            ["section"=>"mon_theme_apparence",
                            "label"=>"Couleur du site__footer" ]));
 
                                                  
    });