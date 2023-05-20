<?php
function dankit_widgets()
{
    register_sidebar(["name" => __("Dankit first Sidebar", "dankit"), "id" => "dankit_sidebar", "description" => __("Dankit first Sidebar for something.")]);
}