$file = "$PSScriptRoot\index.html"
$lines = [System.IO.File]::ReadAllLines($file, [System.Text.Encoding]::UTF8)
$out = [System.Collections.Generic.List[string]]::new()

$skipSecondTicker = $false
$firstTickerSeen = $false

for ($i = 0; $i -lt $lines.Length; $i++) {
    $line = $lines[$i]

    # Track when we see the hero ticker comment
    if ($line -match '<!-- Country ticker -->') {
        if ($firstTickerSeen) {
            # This is the second ticker - skip it and its closing divs
            $skipSecondTicker = $true
            $depth = 0
            continue
        } else {
            $firstTickerSeen = $true
        }
    }

    if ($skipSecondTicker) {
        foreach ($m in [regex]::Matches($line, '<div')) { $depth++ }
        foreach ($m in [regex]::Matches($line, '</div>')) { $depth-- }
        if ($depth -le 0) {
            $skipSecondTicker = $false
        }
        continue
    }

    # Fix: the hero-badge DREAM line is followed directly by <a> - needs hero-ctas wrapper
    if ($line -match 'class="hero-badge".*DREAM\. DESIRE\. DEPART\.') {
        $out.Add($line)
        # Check if next non-empty line is an <a> without hero-ctas wrapper
        $nextIdx = $i + 1
        while ($nextIdx -lt $lines.Length -and $lines[$nextIdx].Trim() -eq '') { $nextIdx++ }
        if ($lines[$nextIdx] -match '<a href.*btn.*WhatsApp' -and $lines[$nextIdx] -notmatch 'hero-ctas') {
            $out.Add('    <div class="hero-ctas">')
        }
        continue
    }

    # Close hero-ctas before trust-bar
    if ($line -match 'class="trust-bar"') {
        # Check if we opened hero-ctas and need to close it
        $out.Add('    </div><!-- /hero-ctas -->')
    }

    $out.Add($line)
}

[System.IO.File]::WriteAllLines($file, $out, [System.Text.Encoding]::UTF8)
Write-Host "DONE - lines: $($out.Count)"
