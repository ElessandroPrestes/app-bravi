import React from "react";
import { change, login } from "../../actions/auth.action";
import { Redirect } from "react-router-dom";
import { Link } from "@mui/material";
import { useSelector, useDispatch} from "react-redux";
import Button from "@mui/material/Button";
import CssBaseline from "@mui/material/CssBaseline";
import Input from "@mui/material/Input";
import InputLabel from "@mui/material/InputLabel";
import InputAdornment from "@mui/material/InputAdornment";
import IconButton from "@mui/material/IconButton";
import FormControl from "@mui/material/FormControl";
import FormControlLabel from "@mui/material/FormControlLabel";
import Checkbox from "@mui/material/Checkbox";
import Paper from "@mui/material/Paper";
import Box from "@mui/material/Box";
import Grid from "@mui/material/Grid";
import Typography from "@mui/material/Typography";
import { makeStyles } from "@mui/styles";
import {MdOutlineVisibility, MdVisibilityOff } from "react-icons/md";


function Copyright() {
    return (
        <Typography variant="body2" color="textSecondary" align="center">
            {"Copyright © "}
            <Link
                href="https://www.linkedin.com/in/elessandro-prestes-macedo-278189126/"
                target="_blank"
                rel="noopener"
            >
                Elessandro
            </Link>{" "}
            {new Date().getFullYear()}
            {"."}
        </Typography>
    );
}

const useStyles = makeStyles((theme) => ({
    root: {
        height: "100vh",
        textAlign: "center",
    },
    image: {
        backgroundImage: "url(https://source.unsplash.com/random)",
        backgroundRepeat: "no-repeat",
        backgroundColor:
            theme.palette.type === "light"
                ? theme.palette.grey[900]
                : theme.palette.grey[900],
        backgroundSize: "cover",
        backgroundPosition: "center",
    },
    logo: {
        height: "12vh",
        borderRadius: "15px",
        marginBottom: theme.spacing(3),
    },
    paper: {
        margin: theme.spacing(8, 4),
        display: "flex",
        flexDirection: "column",
        alignItems: "center",
    },
    form: {
        width: "100%", // Fix IE 11 issue.
        marginTop: theme.spacing(1),
    },
   
}));

export default function Auth() {
    const classes = useStyles();
    const dispatch = useDispatch();
    const { credentials, success } = useSelector(state => state.authReducer);
    const [values, setValues] = React.useState({
        showPassword: false,
    });

    const handleClickShowPassword = () => {
        setValues({
            ...values,
            showPassword: !values.showPassword,
        });
    };

    const handleMouseDownPassword = (event) => {
        event.preventDefault();
    };
    return (
        <Grid container component="main" className={classes.root}>
            <CssBaseline />
            <Grid item xs={false} sm={4} md={7} className={classes.image} />
            <Grid
                item
                xs={12}
                sm={8}
                md={5}
                component={Paper}
                elevation={6}
                square
            >
                <div className={classes.paper}>
                    <img
                        src="/logo150.png"
                        alt="Logo Cloudfox"
                        className={classes.logo}
                    />
                    <Typography component="h1" variant="h6" className="mb-2">
                        App-Bravi
                    </Typography>
                    <form className={classes.form} noValidate>
                        <FormControl
                            sx={{ m: 1, width: "75%" }}
                            variant="standard"
                        >
                            <InputLabel htmlFor="standard-adornment-email">
                                Email
                            </InputLabel>
                            <Input
                                type="email"
                                name="email"
                                autoFocus
                                autoComplete="email"
                                value={credentials.email}
                                onChange={text =>
                                    dispatch(
                                        change({ email: text.target.value })
                                    )
                                }
                            />
                        </FormControl>
                        <FormControl
                            sx={{ m: 1, width: "75%" }}
                            variant="standard"
                        >
                            <InputLabel htmlFor="standard-adornment-password">
                                Senha
                            </InputLabel>
                            <Input
                                type={values.showPassword ? "text" : "password"}
                                name="password"
                                value={credentials.password}
                                onChange={text =>
                                    dispatch(
                                        change({ password: text.target.value })
                                    )
                                }
                                endAdornment={
                                    <InputAdornment position="end">
                                        <IconButton
                                            aria-label="toggle password visibility"
                                            onClick={handleClickShowPassword}
                                            onMouseDown={
                                                handleMouseDownPassword
                                            }
                                        >
                                            {values.showPassword ? (
                                                <MdVisibilityOff />
                                            ) : (
                                                <MdOutlineVisibility />
                                            )}
                                        </IconButton>
                                    </InputAdornment>
                                }
                            />
                        </FormControl>

                        <FormControlLabel
                            sx={{ width: "75%" }}
                            className="mt-2 mb-2"
                            control={
                                <Checkbox value="remember" color="primary" />
                            }
                            label="Lembrar-me"
                        />
                        <Button
                            sx={{ width: "75%" }}
                            type="submit"
                            variant="contained"
                            color="primary"
                            size="large"
                            className="mt-3 mb-3"
                            onClick={() => dispatch(login(credentials))}
                        >
                            {" "}
                            Entrar
                        </Button>
                        {(success) && <Redirect to="/pay" />}

                        <Grid container spacing={2}>
                            <Grid item xs={12} md={12}>
                                <Link
                                    to="#"
                                    className="text-info"
                                    variant="body2"
                                >
                                    Esqueceu a Senha?
                                </Link>
                            </Grid>
                            <Grid item xs={12} md={12}>
                                <Link href="/register" className="text-info">
                                    {"Não tem uma conta? Cadastre-se"}
                                </Link>
                            </Grid>
                        </Grid>
                        <Box mt={5}>
                            <Copyright />
                        </Box>
                    </form>
                </div>
            </Grid>
        </Grid>
    );
}
