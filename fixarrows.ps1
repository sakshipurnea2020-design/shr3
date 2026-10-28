$file = "$PSScriptRoot\index.html"
$lines = [System.IO.File]::ReadAllLines($file, [System.Text.Encoding]::UTF8)
$out = [System.Collections.Generic.List[string]]::new()
$replacementChar = [char]0xFFFD

for ($i = 0; $i -lt $lines.Length; $i++) {
    $line = $lines[$i]

    # Fix ps-toggle spans with broken char - replace with down arrow (collapsed state)
    if ($line -match 'ps-toggle' -and $line -match [regex]::Escape($replacementChar)) {
        $line = $line -replace [regex]::Escape($replacementChar), '&#9660;'
    }

    # Fix Next Step button broken char
    if ($line -match 'Next Step' -and $line -match [regex]::Escape($replacementChar)) {
        $line = $line -replace [regex]::Escape($replacementChar), '&#8594;'
    }

    $out.Add($line)
}

[System.IO.File]::WriteAllLines($file, $out, [System.Text.Encoding]::UTF8)
Write-Host "DONE - lines: $($out.Count)"
