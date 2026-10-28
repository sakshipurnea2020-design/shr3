$files = Get-ChildItem "$PSScriptRoot\*.html" | Select-Object -ExpandProperty FullName
foreach ($file in $files) {
    $content = [System.IO.File]::ReadAllText($file, [System.Text.Encoding]::UTF8)
    if ($content -match 'facebook.com/shreyanamankan') {
        $content = $content.Replace('https://facebook.com/shreyanamankan', 'https://www.facebook.com/profile.php?id=61572047660426')
        [System.IO.File]::WriteAllText($file, $content, [System.Text.Encoding]::UTF8)
        Write-Host "Updated: $(Split-Path $file -Leaf)"
    }
}
Write-Host "DONE"
