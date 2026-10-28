$file = "$PSScriptRoot\index.html"
$content = [System.IO.File]::ReadAllText($file, [System.Text.Encoding]::UTF8)

# Make the open state display:block use !important to override any inline styles
$content = $content.Replace(
    '.svc-card.open .svc-card-body{display:block}',
    '.svc-card.open .svc-card-body{display:block!important}'
)

# Also move the JS to run after DOMContentLoaded to ensure elements exist
$content = $content.Replace(
    '// Service card toggle
(function(){
  document.querySelectorAll(''.svc-card'').forEach(function(card){
    var btn = card.querySelector(''.svc-toggle-btn'');
    if(!btn) return;
    btn.addEventListener(''click'', function(){
      var isOpen = card.classList.toggle(''open'');
      btn.setAttribute(''aria-expanded'', isOpen ? ''true'' : ''false'');
      btn.innerHTML = isOpen ? ''Minimise &#9650;'' : ''Click to expand &#9660;'';
    });
  });
})();',
    '// Service card toggle
document.addEventListener(''DOMContentLoaded'', function(){
  document.querySelectorAll(''.svc-card'').forEach(function(card){
    var btn = card.querySelector(''.svc-toggle-btn'');
    if(!btn) return;
    btn.addEventListener(''click'', function(e){
      e.stopPropagation();
      var body = card.querySelector(''.svc-card-body'');
      var isOpen = card.classList.toggle(''open'');
      if(body) body.style.display = isOpen ? ''block'' : ''none'';
      btn.setAttribute(''aria-expanded'', isOpen ? ''true'' : ''false'');
      btn.textContent = isOpen ? ''Minimise \u25b2'' : ''Click to expand \u25bc'';
    });
  });
});'
)

[System.IO.File]::WriteAllText($file, $content, [System.Text.Encoding]::UTF8)
Write-Host "DONE"
