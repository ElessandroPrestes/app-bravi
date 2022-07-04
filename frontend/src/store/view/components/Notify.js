import React from 'react'
import {changeNotify} from '../../actions/notify.action'
import {Snackbar, SnackbarContent, Button } from '@mui/material'
import {useSelector, useDispatch } from 'react-redux'
import { makeStyles } from "@mui/styles";

const useStyles = makeStyles({
    succes: {
        backgroundColor: "#00e676",
    },
    error: {
        backgroundColor: '#f44336',
    }
});


export default function Notify() {
    const dispatch = useDispatch();
    const notify = useSelector(state => state.notifyReducer);
    const classes = useStyles();

  return <Snackbar 
            anchorOrigin={{
                horizontal: notify.horizontal,
                vertical: notify.vertical
            }}
            open={notify.open}
            autoHideDuration={notify.time}
            onClose={() => dispatch(changeNotify({open:false}))}
          >
              <SnackbarContent
                    className={classes[notify.class] + ' d-flex justify-content-center'}
                    message={
                        <span className=" d-flex align-items-center">{notify.msg}</span>
                    }
              />
          </Snackbar>;
}
