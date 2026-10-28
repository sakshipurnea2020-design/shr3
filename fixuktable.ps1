$file = "$PSScriptRoot\universities-country.html"
$content = [System.IO.File]::ReadAllText($file, [System.Text.Encoding]::UTF8)

# Hide the uni-table-wrap by adding display:none
$content = $content.Replace(
    '.uni-table-wrap{background:var(--white);border-radius:var(--r);box-shadow:var(--sh2);overflow:hidden}',
    '.uni-table-wrap{display:none!important}'
)

# Also hide the disclaimer text below the table
$content = $content.Replace(
    'This shortlist is not a ranking. Verify',
    'HIDE_DISCLAIMER'
)

[System.IO.File]::WriteAllText($file, $content, [System.Text.Encoding]::UTF8)
Write-Host "DONE"
