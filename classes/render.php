<?php

class Render
{
    public function __toString()
    {
        $output = "The following methods are available for " . __CLASS__ ." objects: \n";
        $output .= implode("\n", get_class_methods(__CLASS__));
        return $output;
    }

    public static function listShopping($ingredient_list)
    {
        ksort($ingredient_list);
        return implode("\n", array_keys($ingredient_list));
    }

    public static function listRecipes($titles)
    {
        asort($titles);
        $output= "";
        foreach($titles as $key=> $title){
            if ($output !=""){
                $output .="\n";
            }
            $output .= "[Key] $title";
        }
        return $output;
    }

    public static function displayRecipe($recipe)
    {
        $output = "";
        $output .= $recipe->getTitle() . " by " . $recipe->getSource();
        $output .= "\n";
        $output .= implode(", ",$recipe->getTags());
        $output .= "\n";
        foreach ($recipe->getIngredients() as $ing) {
            $output .= $ing["amount"] . " " . $ing["measure"] . " " . $ing["item"];
            $output .= "\n";
        }
        $output .= implode("\n", $recipe->getInstructions());
        $output .= "\n";
        $output .= $recipe->getYield();
    }

}