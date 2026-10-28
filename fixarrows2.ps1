$file = "$PSScriptRoot\index.html"
$bytes = [System.IO.File]::ReadAllBytes($file)
$text = [System.Text.Encoding]::UTF8.GetString($bytes)

# Print char codes around "ps-toggle" occurrence to identify the broken char
$idx = $text.IndexOf('ps-toggle" aria-hidden="true">')
if ($idx -ge 0) {
    $after = $text.Substring($idx + 30, 10)
    Write-Host "Chars after ps-toggle span open:"
    foreach ($c in $after.ToCharArray()) {
        Write-Host "  U+$([int]$c) '$c'"
    }
}
