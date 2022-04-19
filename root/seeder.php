<?php
    require_once('../helpers/rb.php');
    R::setup( 'mysql:host=localhost;dbname=framework', 'root', '');

    $book1 = R::dispense( 'kitchen' );
    $book1->title = 'Franse keuken';
    $book1->description = 'De Franse keuken is een internationaal gewaardeerde keuken met een lange traditie. Deze keuken wordt gekenmerkt';

    $book2 = R::dispense( 'kitchen' );
    $book2->title = 'Chineese keuken';
    $book2->description = 'De Chinese keuken is de culinaire traditie van China en de Chinesen die in de diaspora leven, hoofdzakelijk in Z';

    $book3 = R::dispense( 'kitchen' );
    $book3->title = 'Hollandse keuken';
    $book3->description = 'De Nederlandse keuken is met name geïnspireerd door het landbouwverleden van Nederland. Alhoewel de keuken per s';

    $book4 = R::dispense( 'kitchen' );
    $book4->title = 'Mediterraans';
    $book4->description = 'De mediterrane keuken is de keuken van het Middellandse Zeegebied en bestaat onder andere uit de tientallen vers';

    R::store($book1);
    R::store($book2);
    R::store($book3);
    R::store($book4);

    $recipes1 = R::dispense( 'recipes' );
    $recipes1->name = 'Pannekoeken';
    $recipes1->type = 'dinner';
    $recipes1->level = 'easy';

    $recipes2 = R::dispense( 'recipes' );
    $recipes2->name = 'Tosti';
    $recipes2->type = 'lunch';
    $recipes2->level = 'easy';

    $recipes3 = R::dispense( 'recipes' );
    $recipes3->name = 'Boeren ommelet';
    $recipes3->type = 'lunch';
    $recipes3->level = 'easy';

    $recipes4 = R::dispense( 'recipes' );
    $recipes4->name = 'Broodje Pulled Pork';
    $recipes4->type = 'lunch';
    $recipes4->level = 'hard';

    $recipes5 = R::dispense( 'recipes' );
    $recipes5->name = 'Hutspot met draadjesvlees';
    $recipes5->type = 'dinner';
    $recipes5->level = 'medium';

    $recipes6 = R::dispense( 'recipes' );
    $recipes6->name = 'Nasi Goreng met Babi ketjap';
    $recipes6->type = 'dinner';
    $recipes6->level = 'hard';

    R::store($recipes1);
    R::store($recipes2);
    R::store($recipes3);
    R::store($recipes4);
    R::store($recipes5);
    R::store($recipes6);


$user = R::dispense( 'user' );
$user->name = 'Erwin';
$user->password = password_hash('user123', PASSWORD_DEFAULT);;
R::store( $user );


?>