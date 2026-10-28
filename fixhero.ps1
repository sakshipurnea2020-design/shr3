$file = "$PSScriptRoot\index.html"
$content = [System.IO.File]::ReadAllText($file, [System.Text.Encoding]::UTF8)

# The hero CTAs are missing their wrapping div. 
# Current broken state: badge then <a> without hero-ctas wrapper
# Fix: add the hero-ctas wrapper back AND insert the ticker between h1 and hero-sub

$oldHeroSection = '<h1>Your International Journey<br>Starts Here</h1>
    <p class="hero-sub">Shreya Namankan helps students from across India get admitted to top universities in 15+ countries'

# Find the hero badge + CTAs block and fix it
$oldBadgeAndCTAs = '<div class="hero-badge" style="font-size:1.275rem;letter-spacing:1.5px"><span aria-hidden="true">&#10022;</span> DREAM. DESIRE. DEPART.</div>
      <a href="https://wa.me/919135288718"'

$newBadgeAndCTAs = '<div class="hero-badge" style="font-size:1.275rem;letter-spacing:1.5px;font-family:var(--font-head);font-weight:700">DREAM. DESIRE. DEPART.</div>
    <div class="hero-ctas">
      <a href="https://wa.me/919135288718"'

$content = $content.Replace($oldBadgeAndCTAs, $newBadgeAndCTAs)

# Also fix: the </a> for "Book Free Evaluation" needs to close hero-ctas div after it
# Find and add the ticker between h1 and hero-sub
$h1Tag = '<h1>Your International Journey<br>Starts Here</h1>'
$tickerHTML = @'
<h1>Your International Journey<br>Starts Here</h1>

    <!-- Country ticker -->
    <div style="display:flex;align-items:center;gap:.9rem;margin:1.2rem 0 1.4rem;flex-wrap:wrap">
      <span style="color:rgba(255,255,255,.72);font-size:1rem">Explore universities in</span>
      <div style="display:inline-flex;align-items:center;gap:.65rem;background:rgba(255,255,255,.1);border:1.5px solid rgba(224,176,52,.4);border-radius:50px;padding:.55rem 1.3rem .55rem .75rem;min-width:210px">
        <img id="hero-flip-flag" src="https://flagcdn.com/w40/gb.png" alt="UK flag" style="width:28px;height:20px;object-fit:cover;border-radius:3px">
        <span id="hero-flip-name" style="font-size:1.15rem;font-weight:700;color:var(--gold);letter-spacing:.3px">United Kingdom</span>
      </div>
    </div>

'@

$content = $content.Replace($h1Tag, $tickerHTML)

[System.IO.File]::WriteAllText($file, $content, [System.Text.Encoding]::UTF8)
Write-Host "DONE"
