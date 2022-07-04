import React from 'react'
import {changeAlert} from '../../actions/alert.action'
import {Modal, Typography }from '@mui/material'
import { useDispatch, useSelector } from 'react-redux'
import {MdError, MdCheckCircle} from 'react-icons/md'

export default function Alert() {
    const dispatch = useDispatch();
    const alert = useSelector(state => state.alertReducer)

    if(alert.open){
        setTimeout(() => dispatch(changeAlert({open: false})), alert.time);
    }

  return (
      <Modal
          open={alert.open}
          onClose={() => dispatch(changeAlert({ open: false }))}
          className="d-flex justify-content-center align-items-center h-100"
      >
          <div className="bg-white d-flex align-items-center rounded p-4 outline-none">
              {alert.class === "success" && (
                  <MdCheckCircle
                      style={{ fontSize: "2.5rem" }}
                      className="ms-3 text-success"
                  />
              )}
              {alert.class === "error" && (
                  <MdError
                      style={{ fontSize: "2.5rem" }}
                      className="ms-3 text-danger"
                  />
              )}
              <Typography className="font-weight-bold" variant="subtitle2">
                  {alert.msg}
              </Typography>
          </div>
      </Modal>
  );
}
