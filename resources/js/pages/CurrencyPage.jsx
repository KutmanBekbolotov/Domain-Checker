import React, { useState } from 'react';

const CurrencyPage = () => {
  const [currency, setCurrency] = useState('');
  const [rate, setRate] = useState(null);
  const [error, setError] = useState(null);

  const handleCurrencyChange = (e) => {
    setCurrency(e.target.value);
  };

  const getCurrencyRate = async () => {
    try {
      const response = await fetch(`/api/currency?currency=${currency}`);
      const data = await response.json();

      if (response.ok) {
        setRate(data);  // сохраняем данные о курсе
        setError(null);
      } else {
        setError(data.error || 'Error fetching exchange rate');
      }
    } catch (err) {
      setError('Error connecting to the server');
    }
  };

  return (
    <div>
      <h1>Currency Exchange Rate</h1>
      <input
        type="text"
        value={currency}
        onChange={handleCurrencyChange}
        placeholder="Enter currency code (e.g., USD)"
      />
      <button onClick={getCurrencyRate}>Get Rate</button>

      {error && <p>{error}</p>}
      {rate && (
        <div>
          <h2>Exchange Rates for {currency}</h2>
          <ul>
            {Object.entries(rate.conversion_rates).map(([currency, rateValue]) => (
              <li key={currency}>
                {currency}: {rateValue} KGS
              </li>
            ))}
          </ul>
        </div>
      )}
    </div>
  );
};

export default CurrencyPage;