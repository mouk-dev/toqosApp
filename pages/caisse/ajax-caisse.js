document.addEventListener('DOMContentLoaded', function () {
  const inputStatut = document.getElementById('statut-caisse');
  const inputType = document.getElementById('type-caisse');
  const inputDate = document.getElementById('date');
  const tableBody = document.getElementById('attendance-table');
  const spinner = document.getElementById('spinner');

  function updateTable() {
    spinner.style.display = 'block';

    const params = new URLSearchParams({
      statut: inputStatut.value || '',
      type: inputType.value || '',
      date: inputDate.value || ''
    });

    fetch('ajax-caisse.php?' + params)
      .then(r => r.text())
      .then(html => {
        tableBody.innerHTML = html;
        spinner.style.display = 'none';
      })
      .catch(err => {
        console.error('Erreur AJAX:', err);
        spinner.style.display = 'none';
      });
  }

  inputStatut.addEventListener('change', updateTable);
  inputType.addEventListener('change', updateTable);
  inputDate.addEventListener('change', updateTable);
});
