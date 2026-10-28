$file = "$PSScriptRoot\index.html"
$bytes = [System.IO.File]::ReadAllBytes($file)
$text = [System.Text.Encoding]::UTF8.GetString($bytes)

$search = 'ps-toggle" aria-hidden="true">'
$idx = $text.IndexOf($search)
Write-Host "Found at: $idx"

if ($idx -ge 0) {
    $pos = $idx + $search.Length
    Write-Host "Char at pos $pos : U+$([int]$text[$pos]) = '$($text[$pos])'"
    Write-Host "Char at pos $($pos+1) : U+$([int]$text[$pos+1]) = '$($text[$pos+1])'"
    Write-Host "Char at pos $($pos+2) : U+$([int]$text[$pos+2]) = '$($text[$pos+2])'"
}
