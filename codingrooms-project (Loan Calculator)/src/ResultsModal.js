import React from "react";
import { useState } from 'react';

// TODO: Import React Bootstrap components 
import Modal from 'react-bootstrap/Modal';
import Button from 'react-bootstrap/Button';


// TODO: Convert to use React Bootstrap components
function ModalResults(props) {
   
   return (
      <Modal show={props.show}>
      <Modal.Header closeButton onClick={props.hide}>
         <Modal.Title>Loan Details</Modal.Title>
      </Modal.Header>
      <Modal.Body>
         <p>
            Monthly payment:{" "}
            <span className="fw-bold fs-4">
               {props.monthlyPayment}
            </span>
         </p>
         <p>
            Total interest:{" "}
            <span className="fw-bold fs-4">
               {props.totalInterest}
            </span>
         </p>
         <p>
            Total payment:{" "}
            <span className="fw-bold fs-4">
               {props.totalPayment}
            </span>
         </p>
         </Modal.Body>
         <Modal.Footer>
            <Button onClick={props.hide}>OK</Button>
         </Modal.Footer>
      </Modal>
   );
}

export default ModalResults;