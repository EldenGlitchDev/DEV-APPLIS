<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;


#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class BanWord extends Constraint
{
    
    public function __construct(

        public string $message = 'Ce message contient un mot banni : "{{ banWord }}".',
        public array $banWords = ['spam', 'viagra', 'lol', 'salope', 'pute', 'merde', 'chibre', 'bite', 'zgeg', 'zizi', 'backroom', 'chiasse', 'à chier', 'à couilles rabattues', 'à deux trois poils de cul', 'à la con', 'à la mords-moi', 'à la mords-moi-le-nœud', 'à la roule-moi les couilles dans la laitue', 'à un poil de cul', 'agacer le sous-préfet', 'alibofi', 'aller aux putes', 'aller chier dans sa caisse', 'aller libérer Mandela', 'aller niquer sa mère', 'aller se faire empapaouter', 'aller se faire enculer', 'aller se faire foutre', 'aller se faire mettre', 'aller voir la veuve poignet', 'aller voir madame cinq doigts', 'allez vous faire foutre', 'archicon', 'archifoutre', 'arriver comme le marquis de Couille-Verte', 'asphalteuse', 'asti', 'astiquer', 'attaï', 'avaleuse de sabre', 'avoir de la chatte', 'avoir de la merde dans les yeux', 'avoir de la moule', 'avoir des couilles', 'avoir des couilles au cul', 'avoir du cul', 'avoir du poil au bon endroit', 'avoir du poil au cul', 'avoir l’air con', 'avoir la gaule', 'avoir la gueule dans le cul', 'avoir la tête dans le cul', 'avoir le cul bordé de médailles', 'avoir le cul bordé de nouilles', 'avoir le feu au cul', 'avoir le papier qui colle aux bonbons', 'avoir le trou du cul en chou-fleur', 'avoir les couilles', 'avoir les nerfs', 'avoir les rideaux qui collent aux fenêtres', 'avoir les yeux en couilles d’hirondelle', 'avoir les yeux en trou de bite', 'avoir les yeux en trou de pine', 'avoir plein le cul', 'avoir un balai dans le cul', 'avoir une plume dans le cul',
                                   'BAB', 'bagouse', 'baisable', 'baise', 'baisé', 'baiser', 'baiser comme des lapins', 'baiser comme un lapin', 'baiser Fanny', 'baiser le cul de la Fanny', 'baiseur', 'balancer la purée', 'balancer la sauce', 'balayette', 'balek', 'banane', 'bande-mou', 'bander', 'bander comme un âne', 'bander comme un cerf', 'bander comme un taureau', 'bander comme un Turc', 'bandeuse', 'bangala', 'baptême', 'bar à putes', 'bat', 'bâton', 'batte', 'bengala', 'benzer', 'berlingue', 'beuteu', 'biatch', 'bibite', 'biétaze', 'biffle', 'biffler', 'bifle', 'bifler', 'bitch', 'bite', 'bite à cul', 'bite au cirage', 'bitembois', 'Bitembois', 'bivouaquer dans la crevasse', 'blanc comme un cul', 'blanc comme une merde de laitier', 'BLC', 'bogmoule', 'bombe atomique', 'bon coup', 'bon sang de merde', 'bonnasse', 'bonne', 'bordel', 'bordel à cul', 'bordel à cul de pompe à merde', 'bordel à cul pompe à merde', 'bordel à culs', 'bordel à queue', 'bordel de merde', 'bosnioule', 'botte', 'botter', 'botter le cul', 'bottes de guidoune', 'bottes de salope', 'boucaque', 'bouche à pipe', 'boucle-la', 'boudiner', 'bouègre', 'bouffable', 'bouffer la chatte', 'bouffer le cul', 'bougnoul', 'bougnoule', 'bougnoulisation', 'bougnouliser', 'boukak', 'boule', 'bouliche', 'bouloir', 'bounioul', 'bounioule', 'bourrer', 'bourriquer', 'boyau cullier', 'branle-couille', 'branlée', 'branler', 'branler le mammouth', 'branlette', 'branlette espagnole', 'branlette intellectuelle', 'branlette thaïlandaise', 'branleur', 'branleuse', 'branlo', 'branlotter', 'brise-burnes', 'briser les couilles', 'briser les noix', 'broutage', 'broute-minou', 'brouter', 'brouter le gazon', 'brouter les couilles', 'brouteur', 'brouteuse', 'bullshitter', 'burne', 'bz',                                 
    ],
        ?array $groups = null,
        mixed $payload = null)
    {
        parent::__construct(null, $groups, $payload); /* Récupération de l'élément parent dans le 'Constraint' (ligne 9) dans 'Constraint.php' ($groups et $payload ont
                                                        été déplacé ligne 16 et 17, donc rappelle de variables à la ligne 19) */
    }

}
