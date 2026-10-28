$files = Get-ChildItem "$PSScriptRoot\*.html" | Select-Object -ExpandProperty FullName
foreach ($file in $files) {
    $content = [System.IO.File]::ReadAllText($file, [System.Text.Encoding]::UTF8)
    $changed = $false

    # Fix Instagram
    if ($content -match 'instagram.com/shreyanamankan') {
        $content = $content -replace 'https://instagram\.com/shreyanamankan', 'https://www.instagram.com/shreya_namankan'
        $changed = $true
    }

    # Fix LinkedIn
    if ($content -match 'linkedin.com/company/shreyanamankan') {
        $content = $content -replace 'https://linkedin\.com/company/shreyanamankan', 'https://www.linkedin.com/company/shreya-namankan/'
        $changed = $true
    }

    if ($changed) {
        [System.IO.File]::WriteAllText($file, $content, [System.Text.Encoding]::UTF8)
        Write-Host "Updated: $(Split-Path $file -Leaf)"
    }
}
Write-Host "DONE"
