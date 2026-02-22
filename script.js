document.addEventListener("mouseover", function(e) {
  const link = e.target.closest("a[href]");
  if (!link) return;

  const url = new URL(link.href);

  // only same-site pages
  if (url.origin !== location.origin) return;

  // skip pages marked heavy
  if (link.dataset.heavy === "true") return;

  if (document.querySelector(`link[href="${link.href}"]`)) return;

  const l = document.createElement("link");
  l.rel = "prefetch";
  l.href = link.href;
  document.head.appendChild(l);
});