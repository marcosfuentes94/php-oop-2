<?php

trait QuantitaException {
    public function controllaQuantita($quantita) {
        if ($quantita > 3) {
            throw new Exception("La quantità non può superare 3 unità.");
        }
    }
}

class Prodotto {
    use QuantitaException;

    protected $id;
    protected $nome;
    protected $prezzo;
    protected $categoria;
    protected $tipo;
    protected $immagineUrl;
    protected $quantitaDisponibile;

    public function __construct($id, $nome, $prezzo, $categoria, $tipo, $immagineUrl, $quantitaDisponibile) {
        $this->id = $id;
        $this->nome = $nome;
        $this->prezzo = $prezzo;
        $this->categoria = $categoria;
        $this->tipo = $tipo;
        $this->immagineUrl = $immagineUrl;
        $this->quantitaDisponibile = $quantitaDisponibile;
    }

    public function stampaCard() {
        echo "<div class='card'>";
        echo "<img src='{$this->immagineUrl}' class='card-img-top' alt='{$this->nome}'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>{$this->nome}</h5>";
        echo "<p class='card-text'>Categoria: {$this->categoriaIcona()}";
        echo "<p class='card-text'>Tipo: {$this->tipo}</p>";
        echo "<p class='card-text'>Prezzo: {$this->prezzo} €</p>";
        echo "<p class='card-text'>Quantità disponibile: {$this->quantitaDisponibile}</p>";
        echo "<form method='post' action=''>";
        echo "<input type='number' name='quantità' id='quantità' min='1' max='5' value='1'>";
        echo "<input type='hidden' name='id_prodotto' value='{$this->id}'>";
        echo "<button type='button' class='btn btn-primary' onclick='aggiungiAlCarrello()'>Aggiungi al carrello</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }

    public function categoriaIcona() {
        if ($this->categoria === 'Cani') {
            return "<i class='fas fa-dog fa-xl'></i>";
        } elseif ($this->categoria === 'Gatti') {
            return "<i class='fas fa-cat fa-xl'></i>";
        }
        return '';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Store</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 text-center">Pet Store</h1>
        <?php if (isset($errore)): ?>
            <div class="alert alert-danger"><?php echo $errore; ?></div>
        <?php endif; ?>
        <div class="row">
            <div class='col-md-4'>
                <?php $prodotto1 = new Prodotto(1, "CooKing Dog Grain", 10.99, "Cani", "Cibo", "https://www.bauzaar.it/media/catalog/product/c/o/cooking-grain-free-secco-cane-salmone.jpg?width=360&height=360&store=default&image-type=small_image", 5); ?>
                <?php $prodotto1->stampaCard(); ?>
            </div>
            <div class='col-md-4'>
                <?php $prodotto2 = new Prodotto(2, "Pallina Kong Airdog Squeaker", 5.99, "Cani", "Gioco", "https://www.bauzaar.it/media/catalog/product/g/r/grafiche_prodotti_magento_600x600_-_2021-11-19t125018.455.png?width=360&height=360&store=default&image-type=small_image", 10); ?>
                <?php $prodotto2->stampaCard(); ?>
            </div>
            <div class='col-md-4'>
                <?php $prodotto3 = new Prodotto(3, "Matisse Neutered Salmone", 8.99, "Gatti", "Cibo", "https://www.bauzaar.it/media/catalog/product/g/r/grafiche-magento-bauzaar_-_2023-08-02t165805.048.jpg?width=360&height=360&store=default&image-type=small_image", 3); ?>
                <?php $prodotto3->stampaCard(); ?>
            </div>
            <div class='col-md-4'>
                <?php $prodotto4 = new Prodotto(4, "Cuccia Igloo Comics Batman", 12.99, "Gatti", "Cuccia", "https://www.bauzaar.it/media/catalog/product/g/r/grafiche_prodotti_magento_600x600_19__1.png?width=360&height=360&store=default&image-type=small_image", 7); ?>
                <?php $prodotto4->stampaCard(); ?>
            </div>
            <div class='col-md-4'>
                <?php $prodotto5 = new Prodotto(5, "Impermeabile Annapurna", 9.99, "Cani", "Accessori", "https://www.bauzaar.it/media/catalog/product/g/r/grafiche_prodotti_magento_-_2021-09-22t103004.407_5.png?width=360&height=360&store=default&image-type=small_image", 4); ?>
                <?php $prodotto5->stampaCard(); ?>
            </div>
            <div class='col-md-4'>
                <?php $prodotto6 = new Prodotto(6, "Tiragraffi Palm Beach", 3.99, "Gatti", "Gioco", "https://www.bauzaar.it/media/catalog/product/g/r/grafiche-magento-bauzaar_-_2023-06-05t142256.552.jpg?width=360&height=360&store=default&image-type=small_image", 2); ?>
                <?php $prodotto6->stampaCard(); ?>
            </div>
        </div>
    </div>
    
    <script>
        function aggiungiAlCarrello() {
            var quantita = document.getElementById('quantità').value;
            if (quantita > 5) {
                alert("La quantità non può superare le 5 unità per cliente.");
            } else {
                // Invia il modulo per l'acquisto 
            }
        }
    </script>
</body>
</html>
