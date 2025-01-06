<?php
// Contrôleur ShareController - Gère le partage des bébés avec d'autres utilisateurs
class ShareController
{
    private $babyModel;

    public function __construct($babyModel)
    {
        $this->babyModel = $babyModel;
    }

    // Affiche le formulaire pour partager un bébé
    public function share($babyId)
    {
        $baby = $this->babyModel->findById($babyId);
        include __DIR__ . '/../views/baby/share.php';
    }

    // Enregistre un partage
    public function storeShare($babyId, $userEmail, $permissions)
    {
        // Implémentation simplifiée, à compléter avec des vérifications
        $this->babyModel->share($babyId, $userEmail, $permissions);
        header('Location: /babies');
    }
}
