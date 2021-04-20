
<?php
$data = "https://api.namnapi.se/v2/names.json?limit=10";
$json = file_get_contents($data, 0, null, null);
$data = json_decode($json);
$list = "<list>";
foreach ($data->names as $names) {
  $list .= "<ul>
  <li>
  $names->firstname
  $names->surname
  </li>
  </ul>";
}
$list .= "</list>";
echo $list;
