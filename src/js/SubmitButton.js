// src/js/SubmitButton.js

import React from 'react';

const SubmitButton = ({ label, onClick }) => {
  return (
    <button className="btn primary-btn" onClick={onClick}>
      {label}
    </button>
  );
};

export default SubmitButton;
