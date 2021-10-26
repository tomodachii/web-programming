<html>

<html>

<head>
    <title>Product Information Results </title>
</head>

<body>

    <?php
    $description = $_POST['description'];
    $code = $_POST['code'];
    $products = array(
        'ABO1' => '25-Pound Sledgehammer',
        'ABO2' => 'Extra Strong Nails',
        'ABOS' => 'Super Adjustable Wrench',
        'ABO4' => '3-Speed Electric Screwdriver'
    );
    if (ereg('boat|plane', $description)) {
        print 'Sorry, we do not sell boats or planes anymore';
    } elseif (ereg('^AB', $code)) {
        if (isset($products['$code'])) {
            print 'Code $code Description: $products[$code]';
        } else {
            print 'Sorry, product code not found';
        }
    } else {
        print 'Sorry, all our product codes start with "AB"';
    }
    ?>
</body>
/<html>