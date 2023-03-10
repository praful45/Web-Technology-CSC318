<?php
interface Animal {
    public function makeSound();
  }
  
  interface Plant {
    public function grow();
  }
  
  class Tree implements Plant {
    public function grow() {
      echo "The tree is growing <br>";
    }
  }
  
  class Cat implements Animal {
    public function makeSound() {
      echo "Cat is making sound Meow <br>       ";
    }
  }
  
  class CatTree implements Animal, Plant {
    public function makeSound() {
      echo "The catTree is making sound Meow and ";
    }
    
    public function grow() {
      echo "the cat tree is growing";
    }
  }
  
  $tree = new Tree();
  $cat = new Cat();
  $catTree = new CatTree();
  
  $tree->grow(); // outputs "The tree is growing"
  $cat->makeSound(); // outputs "Meow"
  $catTree->makeSound(); // outputs "Meow"
  $catTree->grow(); // outputs "The cat tree is growing"
  
?>