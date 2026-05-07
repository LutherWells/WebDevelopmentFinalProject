import React from "react";
import Calculator from "./Calculator";

// TODO: Import Container from react-bootstrap
import Container from "react-bootstrap/Container";

// TODO: Add Container component
function App() {
   return (
      <Container>      
         <h1>Loan Calculator</h1>
         <Calculator />
      </Container>
   );
}

export default App;