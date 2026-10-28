$file = "$PSScriptRoot\index.html"
$lines = [System.IO.File]::ReadAllLines($file, [System.Text.Encoding]::UTF8)
$i = 0
foreach ($line in $lines) {
    $i++
    if ($line -match 'ps-toggle' -and $i -lt 1000) {
        Write-Host "Line $i : $line"
        # Print char codes for chars in this line
        foreach ($c in $line.ToCharArray()) {
            $code = [int]$c
            if ($code -gt 127) {
                Write-Host "  Non-ASCII char: U+$([int]$c) at pos"
            }
        }
        break
    }
}
