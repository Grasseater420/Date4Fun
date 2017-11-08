logInSessieGebruiker($total);



$gebruikersid_sessie = $_SESSION['gebruikers_id'];

$query = "SELECT omschrijving, expires
FROM membership
LEFT JOIN members ON membership.membership_id = members.membership_id
LEFT JOIN gebruikers ON gebruikers.gebruiker_id = members.gebruiker_id
WHERE gebruikers.gebruiker_id = $gebruikersid_sessie ";
$result = mysqli_query($db, $query);
$membership = mysqli_fetch_assoc($result);


if (empty($membership['omschrijving']))
{
$_SESSION['membership'] = "Gratis";
}
else {
$_SESSION['membership'] = $membership['omschrijving'];
$_SESSION['membership_expires'] = $membership['expires'];
}
