import React from 'react';
import { Provider } from 'react-redux'
import {store} from './store/store'
import { ThemeProvider, createTheme } from '@mui/material/styles'
import {blue} from '@mui/material/colors'
import 'bootstrap/dist/css/bootstrap.min.css'
import './global.css'
import Routes from './Routes.js'
import { Loading, Notify, Alert } from './store/view/components'

const theme = createTheme({
    palette: {
        primary:{
            main: blue[500]
        },
    },
    propos: {
        MuiTextField: {
            variant: "outlined",
            fullWidth: true,
        },
        MuiSelect: {
            variant: "outlined",
            fullWidth: true,
        },
    },
});

const App = () => (
        <Provider store={store}>
            <ThemeProvider theme={theme}>
                <Alert />
                <Notify />
                <Loading />
                <Routes />
            </ThemeProvider>
        </Provider>
);

export default App;