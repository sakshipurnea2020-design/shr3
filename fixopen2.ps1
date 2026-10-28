$file = "$PSScriptRoot\index.html"
$content = [System.IO.File]::ReadAllText($file, [System.Text.Encoding]::UTF8)

# Fix 1: display:block!important for open state
$content = $content.Replace('.svc-card.open .svc-card-body{display:block}', '.svc-card.open .svc-card-body{display:block!important;visibility:visible!important}')

# Fix 2: Also ensure the body is not being hidden by inline style - update JS to set inline style directly
# Find the JS block and replace it with a version that sets inline style
$oldJS = 'btn.addEventListener(''click'', function(){
      var isOpen = card.classList.toggle(''open'');
      btn.setAttribute(''aria-expanded'', isOpen ? ''true'' : ''false'');
      btn.innerHTML = isOpen ? ''Minimise &#9650;'' : ''Click to expand &#9660;'';
    });'

[System.IO.File]::WriteAllText($file, $content, [System.Text.Encoding]::UTF8)
Write-Host "Step 1 DONE"

# Step 2: patch the JS using regex
$content2 = [System.IO.File]::ReadAllText($file, [System.Text.Encoding]::UTF8)

# Replace just the btn.addEventListener block in the svc-card section
$pattern = 'btn\.addEventListener\(.click., function\(\)\{[^}]+\}\);'
$replacement = @'
btn.addEventListener('click', function(e){
      e.stopPropagation();
      var body = card.querySelector('.svc-card-body');
      var isOpen = card.classList.toggle('open');
      if(body){ body.style.display = isOpen ? 'block' : 'none'; }
      btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      btn.textContent = isOpen ? 'Minimise \u25b2' : 'Click to expand \u25bc';
    });
'@

$content2 = [regex]::Replace($content2, $pattern, $replacement)
[System.IO.File]::WriteAllText($file, $content2, [System.Text.Encoding]::UTF8)
Write-Host "Step 2 DONE"
