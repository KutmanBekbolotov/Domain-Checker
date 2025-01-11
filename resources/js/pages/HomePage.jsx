import React from 'react';

const HomePage = () => {
  return (
    <div style={{ textAlign: 'center', padding: '20px' }}>
      <h1>Welcome to Our Services</h1>
      <p>Select a service to get started:</p>
      <ul style={{ listStyle: 'none', padding: 0 }}>
        <li><a href="/currency">Currency Exchange Service</a></li>
        <li><a href="/posts">Blog page</a></li>

      </ul>
    </div>
  );
};

export default HomePage;