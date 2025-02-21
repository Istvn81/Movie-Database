<?php
namespace Provider;

class Movie {
    private $name;
    private $relase;
    private $actors;
    private $category;
    private $description;
    private $cover_path;

    // értékadás az adattagoknak
    function set_name($name) {
        $this->name = $name;
    }
    function set_relase($relase) {
        $this->relase = ($this->relase == null) ? "nincs adat" : $relase;
    }
    function set_actors($actors) {
        $this->actors = ($this->actors == null) ? "nincs adat" : $actors;
    }
    function set_category($category) {
        $this->category = ($this->category == null) ? "nincs adat" : $category;
    }
    function set_description($description) {
        $this->description = ($this->description == null) ? "nincs adat" : $description;
    }
    function set_cover_path($cover_path) {
        $this->cover_path = $cover_path;
    }

    // az adattagok értékeinek az elérése
    function get_name() {
        return $this->name;
    }
    function get_relase() {
        return $this->relase;
    }
    function get_actors() {
        return $this->actors;
    }
    function get_category() {
        return $this->category;
    }
    function get_description() {
        return $this->description;
    }
    function get_cover_path() {
        return $this->cover_path;
    }
}
?>